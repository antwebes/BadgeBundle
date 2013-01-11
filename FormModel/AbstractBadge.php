<?php

namespace ant\BadgeBundle\FormModel;

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

}
