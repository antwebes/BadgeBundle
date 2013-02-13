<?php

namespace Ant\BadgeBundle\Controller;

use Ant\BadgeBundle\Model\BadgeInterface;
use Ant\BadgeBundle\Model\ParticipantInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Ant\BadgeBundle\Provider\ProviderInterface;
use Symfony\Component\HttpFoundation\Request;

class RankController extends ContainerAware
{	
	/**
	 * Displays a rank
	 *
	 * @param string $rankId the rank id
	 * @return Response
	 */
	public function rankAction($rankId)
	{
		$rank = $this->getProvider()->getRank($rankId);
	
		return $this->container->get('templating')->renderResponse('AntBadgeBundle:Rank:rank.html.twig', array(
				'rank' => $rank
		));
	}
	/**
	 * Displays all ranks
	 *
	 * @return Response
	 */
	public function myShelfAction()
	{
		$ranks = $this->getProvider()->RanksOfParticipantOnline();
		if ($ranks) return $this->container->get('templating')
		->renderResponse('AntBadgeBundle:Rank:myShelf.html.twig', array(
				'ranks' => $ranks
		));
		else throw new NotFoundHttpException(sprintf("No ranks: '%s' found in shelf", $ranks));
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
