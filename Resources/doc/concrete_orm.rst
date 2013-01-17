Concrete classes for Doctrine ORM
=================================

The ORM implementation does not provide concrete models. You must create Badge class in your application::

Badge class
-------------

::

	// src/Acme/BadgeBundle/Entity/Badge.php
	
	namespace Acme\BadgeBundle\Entity;
	
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
	
Rank class
-------------

::

	// src/Acme/BadgeBundle/Entity/Rank.php
	
	namespace Acme\BadgeBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	use ant\BadgeBundle\Entity\Rank as BaseRank;
	use ant\BadgeBundle\Model\ParticipantInterface;
	/**
	 * @ORM\Entity
	 */
	class Rank extends BaseRank
	{
	    /**
	     * @ORM\Id
	     * @ORM\Column(type="integer")
	     * @ORM\GeneratedValue(strategy="AUTO")
	     */
	    protected $id;
		/**
	     * @ORM\ManyToOne(targetEntity="Acme\UserBundle\Entity\User")
	     */
	    protected $participant;
	    
	    public function setParticipant(ParticipantInterface $participant) {
    	$this->participant = $participant;
    	return $this;
    }
	}