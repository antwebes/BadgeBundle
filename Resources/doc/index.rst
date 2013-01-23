BadgeBundle
===========

This bundle provides a management of badges for user, support for Symfony2.


Installation
-----------------------------------------

Installation is a quick 3 step process:

1. Download BadgeBundle using composer
2. Enable the Bundle
3. Configure your application's config.yml

Step 1: Download BadgeBundle using composer
-----------------------------------------

Add BadgeBundle in your composer.json:

::

	{
	    "require": {
	        "antwebes/badge-bundle" : "dev-master"
	    }
	}


Now tell composer to download the bundle by running the command:

::

	$ php composer.phar update antwebes/badge-bundle


Composer will install the bundle to your project's `vendor/antwebes/badge-bundle` directory.

Step 2: Enable the bundle
-----------------------------------------

Enable the bundle in the kernel:

::

	<?php
	// app/AppKernel.php
	
	public function registerBundles()
	{
	    $bundles = array(
	        // ...
	        new ant\BadgeBundle\AntBadgeBundle()
	    );
	}
	
Step3: Configuration 
-----------------------------------------

Register the bundle's routes

Finally, add the following to your routing file:

::
	
	ant_badge:
	    db_driver: orm
	    badge_class: Acme\BadgeBundle\Entity\Badge
	    rank_class: Acme\BadgeBundle\Entity\Rank
    	group_class: Acme\BadgeBundle\Entity\Group


::

 app/config/routing.yml
	
	badge_bundle:
	    resource: "@AntBadgeBundle/Resources/config/routing.yml"
	    prefix:   /badge


Choose your user
----------------

The rank has a user, called *participant*.
BadgeBundle will only refer to them using the `ParticipantInterface`.
This allows you to use any user class. Just make it implement this interface.

For exemple, if your user class is ``Acme\UserBundle\Document\User``::

    // src/Acme/UserBundle/Document/User.php

    use ant\BadgeBundle\Model\ParticipantInterface as ParticipantBadge;

    /**
     * @ORM\Entity
     */
    class User implements ParticipantBadge
    {
        // your code here
    }

If you need a bundle providing a base user, see http://github.com/FriendsOfSymfony/FOSUserBundle


Creating concrete model classes
-------------------------------

- For Doctrine_ORM_

.. _Doctrine_ORM: concrete_orm.rst


Congratulations! You're ready to use badges in your site!

Basic Usage
===========

Compose a rank
--------------

Create a new rank, from a controller::

		$u = $this->get('security.context')->getToken()->getUser();
    	$composer = $this->get('ant_badge.composer');
    	
    	$rank = $composer->newRank()
	    	->setcount(3)
	    	->setParticipant($u)
	    	//->setAcquired(true)
	    	->setWonAt(new \DateTime('now'))
	    	->getRank();    	
    	
    	$this->get('ant_badge.rank_manager')->saveRank($rank);

Create a event
--------------
In your controller, you can create a badge event.

::

....
	use ant\BadgeBundle\Event\BadgeEvent;
	use ant\BadgeBundle\Event\AntBadgeEvents;
	
	class AcmeController extends Controller
	{
		public function publishAction(){
			...
			$dispatcher = $this->container->get('event_dispatcher');
			$event = new BadgeEvent($em, 'acem\AcmeBundle\Entity\AcmeEntity');
			$dispatcher->dispatch(AntBadgeEvents::POST_PUBLISH, $event);
		}
	}

Advanced Functions
===========

.. _Advanced functions ( listeners.. ): advanced_functions.rst