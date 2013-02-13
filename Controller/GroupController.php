<?php

namespace ant\BadgeBundle\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use ant\BadgeBundle\Provider\ProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use JMS\SecurityExtraBundle\Annotation\Secure;

class GroupController extends ContainerAware
{	
	/**
	 * Create a group
	 * @Secure(roles="ROLE_ADMIN")
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
	/**
	 * Deletes a group
	 * @Secure(roles="ROLE_ADMIN")
	 * @return Response
	 */
	public function deleteAction($groupId)
	{
		$group = $this->getProvider()->getGroup($groupId);
		$this->container->get('ant_badge.group_manager')->deleteGroup($group);
	
		//	return new RedirectResponse($this->container->get('router')->generate('ant_badge_shelf'));//me redirige a la estanteria de insignias
	}
	/**
	 * Edit a group
	 * @Secure(roles="ROLE_ADMIN")
	 * @return Response
	 */
	public function editAction($id, Request $request)
	{
		$group = $this->getProvider()->getGroup($id);
		$form = $this->container->get('ant_badge.group_form.factory')->createForm();
	
		$form->setData($group);
	
		if ('POST' === $request->getMethod()) {
			$form->bind($request);
	
			if ($form->isValid()) {
				$this->container->get('ant_badge.group_manager')->saveGroup($group);
				return new RedirectResponse($this->container->get('router')->generate('ant_group_shelf'));
			}
		}
	
		return $this->container->get('templating')->renderResponse('AntBadgeBundle:Group:edit.html.twig', array(
				'form' => $form->createView(),
				//'data' => $form->getData(),
				'group' => $group
		));
	}
	/**
	 * Displays a group
	 *
	 * @param string $groupId the group id
	 * @return Response
	 */
	public function groupAction($groupId)
	{
		$group = $this->getProvider()->getGroup($groupId);
	
		return $this->container->get('templating')->renderResponse('AntBadgeBundle:Group:group.html.twig', array(
				'group' => $group
		));
	}
	/**
	 * Displays all group
	 *
	 * @return Response
	 */
	public function shelfAction()
	{
		$groups = $this->getProvider()->getShelfGroup();
		if ($groups) return $this->container->get('templating')
		->renderResponse('AntBadgeBundle:Group:shelf.html.twig', array(
				'groups' => $groups
		));
		else throw new NotFoundHttpException(sprintf("No Groups: you have not created any group, create one from the route: ant_group_new"));
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
