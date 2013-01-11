<?php

namespace ant\BadgeBundle\Provider;

/**
 * 
 * @author Pablo <pablo@antweb.es>
 */
interface ProviderInterface
{
	/**
	 * Gets the thread 
	 *
	 * @return badge
	 */
	public function getBadge($badgeId);
}
