<?php

namespace ant\BadgeBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use ant\BadgeBundle\Provider\ProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class GroupController extends ContainerAware
{	
	/**
	 * Create a group
	 *
	 * @return Response
	 */
	public function newGroupAction()
	{
		$form = $this->container->get('ant_badge.new_group_form.factory')->create();
		$formHandler = $this->container->get('ant_badge.new_group_form.handler');
	
		if ($group = $formHandler->process($form)) {
			$this->container->get('ant_badge.group_manager')->saveGroup($group);
			return new RedirectResponse($this->container->get('router')->generate('ant_group_view', array(
					'groupId' => $group->getId()
			)));
			return new RedirectResponse($this->container->get('router')->generate('badge_homepage'));
			
		}	
		return $this->container->get('templating')->renderResponse('AntBadgeBundle:Group:newGroup.html.twig', array(
				'form' => $form->createView(),
				'data' => $form->getData()
		));
	}
}
