<?php

namespace ant\BadgeBundle\BadgeBuilder;

use ant\BadgeBundle\Model\BadgeInterface;
use ant\BadgeBundle\Model\BadgeParticipantInterface;

/**
 * Fluent interface badge builder
 *
 * @author Pablo <pablo@antweb.es>
 */
abstract class AbstractBadgeBuilder
{
    /**
     * The badge we are building
     *
     * @var BadgeInterface
     */
    protected $badge;

    public function __construct(BadgeInterface $badge)
    {
        $this->badge = $badge;
    }

    /**
     * Gets the created badge.
     *
     * @return BadgeInterface the badge created
     */
    public function getBadge()
    {
    	return $this->badge;
    }
    /**
     * @param BadgeInterface
     * @return BadgeBuilder (fluent interface)
     */
    public function setDescription($description)
    {
    	$this->badge->setDescription($description);
    
    	return $this;
    }
    /**
     * @param BadgeInterface
     * @return BadgeBuilder (fluent interface)
     */
    public function setName($name)
    {
    	$this->badge->setName($name);
    
    	return $this;
    }
    /**
     * @param BadgeInterface
     * @return BadgeBuilder (fluent interface)
     */
    public function setImage($image)
    {
    	$this->badge->setImage($image);
    
    	return $this;
    }

}
