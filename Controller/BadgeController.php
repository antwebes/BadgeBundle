<?php

namespace ant\BadgeBundle\Controller;

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
			$this->container->get('ant_badge.badge_manager')->saveBadge($badge);
			//$badge->saveBadge($badge);
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
	 * Gets the provider service
	 *
	 * @return ProviderInterface
	 */
	protected function getProvider()
	{
		return $this->container->get('ant_badge.provider');
	}
}
