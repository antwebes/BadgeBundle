<?php

namespace ant\BadgeBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use ant\BadgeBundle\Provider\ProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use JMS\SecurityExtraBundle\Annotation\Secure;

class BadgeController extends ContainerAware
{	
	/**
	 * Create a badge
	 * @Secure(roles="ROLE_ADMIN")
	 * @return Response
	 */
	public function newBadgeAction()
	{
		$form = $this->container->get('ant_badge.new_badge_form.factory')->create();
		$formHandler = $this->container->get('ant_badge.new_badge_form.handler');
	
		if ($badge = $formHandler->process($form)) {
			$this->container->get('ant_badge.badge_manager')->saveBadge($badge);
			return new RedirectResponse($this->container->get('router')->generate('ant_badge_view', array(
					'badgeId' => $badge->getId()
			)));
			return new RedirectResponse($this->container->get('router')->generate('badge_homepage'));
			
		}	
		return $this->container->get('templating')->renderResponse('AntBadgeBundle:Badge:newBadge.html.twig', array(
				'form' => $form->createView(),
				'data' => $form->getData()
		));
	}
	/**
	 * Edit a badge
	 * @Secure(roles="ROLE_ADMIN")
	 * @return Response
	 */
	public function editBadgeAction($id, Request $request)
	{
		$badge = $this->getProvider()->getBadge($id);
		$form = $this->container->get('ant_badge.badge_form.factory')->createForm();
		
		$form->setData($badge);
		
		if ('POST' === $request->getMethod()) {
			$form->bind($request);
		
			if ($form->isValid()) {
				$this->container->get('ant_badge.badge_manager')->saveBadge($badge);
				return new RedirectResponse($this->container->get('router')->generate('ant_badge_shelf'));
			}
		}
		
		return $this->container->get('templating')->renderResponse('AntBadgeBundle:Badge:edit.html.twig', array(
				'form' => $form->createView(),
				//'data' => $form->getData(),
				'badge' => $badge
		));
	}
	/**
	 * Deletes a badge
	 * @Secure(roles="ROLE_ADMIN")
	 * @return Response
	 */
	public function deleteAction($badgeId)
	{
		$badge = $this->getProvider()->getBadge($badgeId);
		$this->container->get('ant_badge.badge_manager')->deleteBadge($badge);
		
	//	return new RedirectResponse($this->container->get('router')->generate('ant_badge_shelf'));//me redirige a la estanteria de insignias
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
	
		return $this->container->get('templating')->renderResponse('AntBadgeBundle:Badge:badge.html.twig', array(
				'badge' => $badge
		));
	}
	/**
	 * Displays all badges
	 *
	 * @return Response
	 */
	public function shelfAction()
	{
		$badges = $this->getProvider()->getShelf();
		return $this->container->get('templating')
			->renderResponse('AntBadgeBundle:Badge:shelf.html.twig', array(
            	'badges' => $badges
        		));
		
	}
	
	/**
	 * Gets the provider service
	 *
	 * @return ProviderInterface
	 */
	protected function getProvider()
	{
		return $this->container->get('ant_badge.provider');
	}
}
