BadgeBundle
===========

Este bundle permite la gestión de insignias para un usuario.


Instación
-----------------------------------------

Instalación en 3 sencillos pasos:

1. Descarga el BadgeBundle usando composer
2. Habilita el Bundle
3. Modifica tu archivo de configuración config.yml

Paso 1: Descarga BadgeBundle usando composer
-----------------------------------------

Incluye BadgeBundle  en tu composer.json:

::

	{
	    "require": {
	        "antwebes/badge-bundle" : "dev-master"
	    }
	}


Ahora le decimos a composer que descargue el bundle, utilizando este comando

::

	$ php composer.phar update antwebes/badge-bundle


Composer instalará el bundle dentro de tu proyecto en el directorio: `vendor/antwebes/badge-bundle`.

Paso 2: Habilita el bundle
-----------------------------------------

Habilita el bundle en tu kernel:

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
	
Paso 3: Configuración 
-----------------------------------------

Registra las rutas del bundle

Finalmente añade las siguientes lines de configuración:

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


Escoge tu usuario
----------------

El rank tiene un usuario, llamado "participant".
BadgeBundle solo se refiere a él usando el ParticipantInterface
Esto permite que tu uses cualquier clase usuario, el único requisito es que implemente esta interface.

Por ejemplo, si tu clase usuario es ``Acme\UserBundle\Document\User``::

    // src/Acme/UserBundle/Document/User.php

    use Ant\BadgeBundle\Model\ParticipantInterface as ParticipantBadge;

    /**
     * @ORM\Entity
     */
    class User implements ParticipantBadge
    {
        // your code here
    }

Si tu necesitas un bundle proveedor de usuario puedes consultar: http://github.com/FriendsOfSymfony/FOSUserBundle


Creando un concreto modelo de clases
-------------------------------

- For Doctrine_ORM_

.. _Doctrine_ORM: concrete_orm.rst


Felicidades. Ya estás listo para incluir las insignias en tu sitio web.

Uso básico
===========

Antes de nada vamos a clarificar algunos conceptos.

- BADGE: Un badge, se trata de la propia insignia que ganará el usuario, contiene los requisitos necesarios para poder ganarla. Por ejemplo, Comentario Oro ( haber escrito 100 comentarios), Comentario Plata (haber escrito 50 comentarios) ...
- GROUP: Se trata de un grupo de badges con los mismos requisitos, por ejemplo en el caso anterior sería el grupo : Comentario , en este grupo estarán todos los badges que se consiguen por algo relacionado con la entidad comentario.
- RANK: ranking de cada usuario, es decir: 

	- Participant: James
	- Badge: Comentario Oro
	- Count: Contador del usuario para este badge, es decir cuantos comentarios lleva escritos.
	- wonAt: null or datetime
	- acquired: bool ( true or false)

	Un usuario tendrá un rank por cada badge en el que esté participando.

	Si el count del usuario es mayor que el count necesario del badge, entonces ese rank, se marcará como ganado y se incluirá la fecha en que ha sido logrado. Acquired = true wonAt = "date" 

Crear un grupo
--------------

In the path: ant_group_new

You can create a group, with field name, class and type.

- Name: Nombre del grupo.
- Class: Entidad con la que trabajará :: "acme\AcmeBundle\Entity\Acme"
- Type: por ejemplo "count", "date" esto es libre por el usuario, para que se puedan gestionar en caso de que las insignias se puedan ganar de diferentes maneras

Crear un badge
--------------

In the route: ant_badge_new

You can create a badge, with fields: 

badgeGroup: Group al que pertenece el badge
Name: Nombre del badge
Description
Image: Url asboluta de la imagen del badge 
Count: Cantidad necesaria para ganar el badge.

Crear un rank
--------------

Crear un nuevo rank desde el controlador::

		$u = $this->get('security.context')->getToken()->getUser();
    	$composer = $this->get('ant_badge.composer');
    	
    	$rank = $composer->newRank()
	    	->setcount(3)
	    	->setParticipant($u)
	    	//->setAcquired(true)
	    	->setWonAt(new \DateTime('now'))
	    	->getRank();    	
    	
    	$this->get('ant_badge.rank_manager')->saveRank($rank);

Lanzar un evento
--------------
En tu controlador, puedes crear un badge event::

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

Funciones avanzadas
===========
- For Advanced_Functions_

.. _Advanced_Functions: advanced_functions.rst
