<?php 

namespace ant\BadgeBundle\EventListener;

use ant\BadgeBundle\Provider\ProviderInterface;
use ant\BadgeBundle\ModelManager\GroupManagerInterface;
use ant\BadgeBundle\ModelManager\BadgeManagerInterface;
use ant\BadgeBundle\Event\BadgeEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use ant\BadgeBundle\Event\AntBadgeEvents;


class PublishListener implements EventSubscriberInterface
{
	
	private $badgeManager;
	private $groupManager;
	private $provider;
	
	public function __construct(ProviderInterface $provider, BadgeManagerInterface $BadgeManager, GroupManagerInterface $GroupManager)
	{
		$this->badgeManager = $BadgeManager;
		$this->groupManager = $GroupManager;
		$this->provider = $provider;
		
	}
    static public function getSubscribedEvents()
    {
        return array(
        		AntBadgeEvents::POST_PUBLISH => 'postPublish'
        		
            );
    }

    public function postPublish(BadgeEvent $event)
    {
    	$rookie = $this->provider->RookieUser($event);
    	//$class= $event->getClass();
    	//$group = $this->groupManager->findGroupByClass($class); //to obtain the groups for this class
    	//$badges = $this->badgeManager->findBadgesByGroup($group);
    	ldd($rookie);
    	
    }

}
