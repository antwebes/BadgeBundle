<?php

namespace ant\BadgeBundle\Controller;

use ant\BadgeBundle\BadgeParticipantInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use ant\BadgeBundle\Provider\ProviderInterface;

class BadgeController extends ContainerAware
{
	
	/**
	 * Create a badge
	 *
	 * @return Response
	 */
	public function newBadgeAction()
	{
		$form = $this->container->get('ant_badge.new_badge_form.factory')->create();
		$formHandler = $this->container->get('ant_badge.new_badge_form.handler');
	
		if ($badge = $formHandler->process($form)) {
			return new RedirectResponse($this->container->get('router')->generate('ant_badge_view', array(
					'badgeId' => $badge->getId()
			)));
		}	
		return $this->container->get('templating')->renderResponse('BadgeBundle:Badge:newBadge.html.twig', array(
				'form' => $form->createView(),
				'data' => $form->getData()
		));
	}
	/**
	 * Displays a badge
	 *
	 * @param string $badgeId the badge id
	 * @return Response
	 */
	public function badgeAction($badgeId)
	{
		$badge = $this->getProvider()->getBadge($badgeId);
	
		return $this->container->get('templating')->renderResponse('BadgeBundle:Badge:badge.html.twig', array(
				'badge' => $badge
		));
	}
	
    /**
     * Displays the badget of a user
     *
     * @return Response
     */
    public function badgetUserAction($userId)
    {
    	$badget = $this->getProvider()->getBadgetUser($userId);

        return $this->container->get('templating')->renderResponse('BadgeBundle:Badge:badgetUser.html.twig', array(
            'badget' => $badget
        ));
    }

    /**
     * Displays the authenticated participant sent mails
     *
     * @return Response
     */
    public function sentAction()
    {
        $threads = $this->getProvider()->getSentThreads();

        return $this->container->get('templating')->renderResponse('FOSMessageBundle:Message:sent.html.twig', array(
            'threads' => $threads
        ));
    }

    /**
     * Displays a thread, also allows to reply to it
     *
     * @param strind $threadId the thread id
     * @return Response
     */
    public function threadAction($threadId)
    {
        $thread = $this->getProvider()->getThread($threadId);
        $form = $this->container->get('fos_message.reply_form.factory')->create($thread);
        $formHandler = $this->container->get('fos_message.reply_form.handler');

        if ($message = $formHandler->process($form)) {
            return new RedirectResponse($this->container->get('router')->generate('fos_message_thread_view', array(
                'threadId' => $message->getThread()->getId()
            )));
        }

        return $this->container->get('templating')->renderResponse('FOSMessageBundle:Message:thread.html.twig', array(
            'form' => $form->createView(),
            'thread' => $thread
        ));
    }

    /**
     * Create a new message thread
     *
     * @return Response
     */
    public function newThreadAction()
    {
        $form = $this->container->get('fos_message.new_thread_form.factory')->create();
        $formHandler = $this->container->get('fos_message.new_thread_form.handler');

        if ($message = $formHandler->process($form)) {
            return new RedirectResponse($this->container->get('router')->generate('fos_message_thread_view', array(
                'threadId' => $message->getThread()->getId()
            )));
        }

        return $this->container->get('templating')->renderResponse('FOSMessageBundle:Message:newThread.html.twig', array(
            'form' => $form->createView(),
            'data' => $form->getData()
        ));
    }

    /**
     * Deletes a thread
     *
     * @return Response
     */
    public function deleteAction($threadId)
    {
        $thread = $this->getProvider()->getThread($threadId);
        $this->container->get('fos_message.deleter')->markAsDeleted($thread);
        $this->container->get('fos_message.thread_manager')->saveThread($thread);

        return new RedirectResponse($this->container->get('router')->generate('fos_message_inbox'));
    }

    /**
     * Searches for messages in the inbox and sentbox
     *
     * @return Response
     */
    public function searchAction()
    {
        $query = $this->container->get('fos_message.search_query_factory')->createFromRequest();
        $threads = $this->container->get('fos_message.search_finder')->find($query);

        return $this->container->get('templating')->renderResponse('FOSMessageBundle:Message:search.html.twig', array(
            'query' => $query,
            'threads' => $threads
        ));
    }

    /**
     * Gets the provider service
     *
     * @return ProviderInterface
     */
    protected function getProvider()
    {
        return $this->container->get('fos_message.provider');
    }
}
