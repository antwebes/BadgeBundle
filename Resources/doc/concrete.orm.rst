Concrete classes for Doctrine ORM
=================================

The ORM implementation does not provide concrete models. You must create Badge class in your application::

Message class
-------------

::


// src/Acme/MessageBundle/Entity/Badge.php

namespace Acme\MessageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use ant\BadgeBundle\Entity\Badge as BaseBadge;

/**
 * @ORM\Entity
 */
class Badge extends BaseBadge
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

}