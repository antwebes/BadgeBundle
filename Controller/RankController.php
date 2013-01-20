<?php

namespace ant\BadgeBundle\Controller;

use ant\BadgeBundle\Model\BadgeInterface;
use ant\BadgeBundle\Model\ParticipantInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use ant\BadgeBundle\Provider\ProviderInterface;
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
	 * Gets the provider service
	 *
	 * @return ProviderInterface
	 */
	protected function getProvider()
	{
		return $this->container->get('ant_badge.provider');
	}
}
