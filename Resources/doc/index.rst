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
	        new Ant\BadgeBundle\AntBadgeBundle()
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

    use Ant\BadgeBundle\Model\ParticipantInterface as ParticipantBadge;

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

First we must clarify some concepts.

- BADGE: A badge that has requirements for the user to get it. For example, Comment Gold ( write 100 comments), comment platinum (write 50 comments) ...
- GROUP: Group of badges with same requirements. For example, Group Comment, in this group will be all the badges of comments
- RANK: Rank of each user, i.e:

	- Participant: James
	- Badge: Comment Gold
	- Count: Count of the user to participate for this badge
	- wonAt: null or datetime
	- acquired: bool ( true or false)

	A user will have a rank for each badge which is participating.

	If the user count is greater than the count necessary for win the badge, the field Acquired = true wonAt = "date when the user got the badge" 

Create a group
--------------

In the path: ant_group_new

You can create a group, with field name, class and type.

- Name: Name of group.
- Class: Entity with it will work. "acme\AcmeBundle\Entity\Acme"
- Type: for example, "count" "date" ... requirement for win the badges this group

Create a badge
--------------

In the route: ant_badge_new

You can create a badge, with fields: 

badgeGroup: Group to which belongs the badge
Name: name of badge
Description
Image: Url of image of badge. 
Count: Amount necessary for win the badge.

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
In your controller, you can create a badge event::

	use Ant\BadgeBundle\Event\BadgeEvent;
	use Ant\BadgeBundle\Event\AntBadgeEvents;
	
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
- For Advanced_Functions_

.. _Advanced_Functions: advanced_functions.rst
