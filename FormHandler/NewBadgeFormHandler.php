<?php

namespace ant\BadgeBundle\FormHandler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Form;
use ant\BadgeBundle\FormModel\AbstractBadge;
use ant\BadgeBundle\FormModel\NewBadge;

class NewBadgeFormHandler extends AbstractBadgeFormHandler
{
    /**
     * Composes a badge from the form data
     *
     * @param AbstractBadge $badge
     * @return BadgeInterface the composed badge 
     * @throws InvalidArgumentException if the badge is not a NewBadge
     */
    public function composeBadge(AbstractBadge $badge)
    {
        if (!$badge instanceof NewBadge) {
            throw new \InvalidArgumentException(sprintf('Badge must be a NewBadge instance, "%s" given', get_class($message)));
        }
        
        return $this->composer->newBadge()
            ->setDescription($badge->getDescription())
            ->setName($badge->getName())
            ->setImage($badge->getImage())
            ->setCount($badge->getCount())
            ->setBadgeGroup($badge->getBadgeGroup())
            ->getBadge();
    }
    
    /**
     * Processes the valid form
     *
     * @param Form
     * @return BadgeInterface
     */
    public function processValidForm(Form $form)
    {
    	$badge = $this->composeBadge($form->getData()); // $badge is a NewBadgeBuilder
    
    	return $badge;
    }
}

