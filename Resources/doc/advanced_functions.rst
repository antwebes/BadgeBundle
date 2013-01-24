Advanced Functions
===========

Create a listener 
-----------------

We can create a listener to the event win a badge.
::

	//src/Acme/BadgeBundle/Listener/Listener.php
	
	namespace Acme\BadgeBundleBundle\Listener;
	
	use ant\SocialBundle\Model\NotificacionInterface;
	use ant\BadgeBundle\Event\RankEvent;
	use Symfony\Component\EventDispatcher\EventSubscriberInterface;
	use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
	use ant\BadgeBundle\Event\AntBadgeEvents;
	
	
	class Listener implements EventSubscriberInterface
	{
	
	    static public function getSubscribedEvents()
	    {
	        return array(
	        		AntBadgeEvents::POST_ACQUIRED => 'postAcquired'        		
	            );
	    }
	
	    public function postAcquired(RankEvent $event)
	    {
			//All code you want
			//$badge = $event->getRank()->getBadge();
			//$u = $event->getRank()->getParticipant();
			//.....	    	
	    }
	
	}