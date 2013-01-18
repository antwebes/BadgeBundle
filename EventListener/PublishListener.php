<?php 

namespace ant\BadgeBundle\EventListener;

use ant\BadgeBundle\ModelManager\BadgeManagerInterface;

use ant\BadgeBundle\Event\BadgeEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use ant\BadgeBundle\Event\AntBadgeEvents;

class PublishListener implements EventSubscriberInterface
{
	
	private $badgeManager;
	
	public function __construct(BadgeManagerInterface $BadgeManager)
	{
		$this->badgeManager = $BadgeManager;
	}
    static public function getSubscribedEvents()
    {
        return array(
        		AntBadgeEvents::POST_PUBLISH => 'postPublish'
        		
            );
    }

    public function postPublish(BadgeEvent $event)
    {
    	$class= $event->getClass();
    	$badges = $this->badgeManager->findBadgeByClass($class);
    	ldd($class, $badges);
    }

}