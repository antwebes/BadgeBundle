<?php

namespace ant\BadgeBundle\FormModel;

use ant\BadgeBundle\Model\BadgeInterface;

abstract class AbstractBadge
{
	
    /**
     * The badge description
     *
     * @var string
     */
    protected $description;

    /**
     * The badge name
     *
     * @var string
     */
    protected $name;
    /**
     * The badge name image
     *
     * @var string
     */
    protected $image;
    /**
     * The badge child
     *
     * @var string
     */
    protected $child;
    /**
     * amount necessary to obtain the badge
     *
     * @var int
     */
    protected $count;
    /**
     * The class associated
     *
     * @var string
     */
    protected $class;
    /**
     * The type associated
     *
     * @var string
     */
    protected $type;
    
    /**
     * @return string
     */
    public function getImage()
    {
    	return $this->image;
    }
    
    /**
     * @param  string
     * @return null
     */
    public function setImage($image)
    {
    	$this->image = $image;
    }
    
    
    /**
     * @return string
     */
    public function getName()
    {
    	return $this->name;
    }
    
    /**
     * @param  string
     * @return null
     */
    public function setName($name)
    {
    	$this->name = $name;
    }
    
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param  string
     * @return null
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getChild() {
    	return $this->child;
    }
    
    public function setChild(BadgeInterface $child) {
    	$this->child = $child;
    }
    /**
     * @return int
     */
    public function getCount()
    {
    	return $this->count;
    }
    /**
     * @param  int
     * @return null
     */
    public function setCount($count)
    {
    	$this->count = $count;
    }
    /**
     * @return string
     */
    public function getClass()
    {
    	return $this->class;
    }
    /**
     * @param  string
     * @return null
     */
    public function setClass($class)
    {
    	$this->class = $class;
    }

}
