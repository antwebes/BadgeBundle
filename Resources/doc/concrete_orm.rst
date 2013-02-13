Concrete classes for Doctrine ORM
=================================

The ORM implementation does not provide concrete models. You must create Badge class in your application::

Badge class
-------------

::

	// src/Acme/BadgeBundle/Entity/Badge.php
	
	namespace Acme\BadgeBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	use Ant\BadgeBundle\Entity\Badge as BaseBadge;
	
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
	     /**
	     * @ORM\ManyToOne(targetEntity="Group", inversedBy="badges")
	     * @ORM\JoinColumn(name="badge_group", referencedColumnName="id")
	     */
	    protected $badgeGroup;
	
	}
	
Rank class
-------------

::

	// src/Acme/BadgeBundle/Entity/Rank.php
	
	namespace Acme\BadgeBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	use Ant\BadgeBundle\Entity\Rank as BaseRank;
	use Ant\BadgeBundle\Model\ParticipantInterface;
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
	    /**
		 * @ORM\ManyToOne(targetEntity="Badge")
		 */
		protected $badge;
		
	    public function setParticipant(ParticipantInterface $participant) {
    		$this->participant = $participant;
    		return $this;
    	}
	}
	
Group class
-------------

::
	 
	// src/Acme/BadgeBundle/Entity/Badge.php
	
	namespace Acme/BadgeBundle\Entity;
	
	use Doctrine\ORM\Mapping as ORM;
	
	use Ant\BadgeBundle\Entity\Group as BaseGroup;
	
	/**
	 * @ORM\Entity
	 * @ORM\Table(name="badge_group") // You don't use group for name table
	 */
	class Group extends BaseGroup
	{
	    /**
	     * @ORM\Id
	     * @ORM\Column(type="integer")
	     * @ORM\GeneratedValue(strategy="AUTO")
	     */
	    protected $id;
	        
	    /**
	     * @ORM\OneToMany(targetEntity="Badge", mappedBy="badgeGroup")
	     */
	    protected $badges;
	
		public function getBadges() {
			return $this->badges;
		}
	
	}