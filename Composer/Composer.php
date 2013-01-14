<?php

namespace ant\BadgeBundle\Composer;

use ant\BadgeBundle\Model\BadgeInterface;

use ant\BadgeBundle\ModelManager\BadgeManagerInterface;
use ant\BadgeBundle\BadgeBuilder\NewBadgeBuilder;

/**
 * Factory for badge builders
 *
 * @author Pablo <pablo@antweb.es>
 */
class Composer implements ComposerInterface
{
    /**
     * Badge manager
     *
     * @var BadgeManagerInterface
     */
    protected $badgeManager;


    public function __construct(BadgeManagerInterface $badgeManager)
    {
        $this->badgeManager = $badgeManager;
    }

    /**
     * Starts composing a badge
     *
     * @return NewBadgeBuilder
     */
    public function newBadge()
    {
    	$badge = $this->badgeManager->createBadge();
    	$badge = $this->badgeManager->saveBadge($badge);

        return new NewBadgeBuilder($badge);
    }
    public function flush(BadgeInterface $badge){
    	
    }

}
