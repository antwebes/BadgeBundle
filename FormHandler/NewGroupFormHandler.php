<?php

namespace ant\BadgeBundle\FormHandler;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Form;
use ant\BadgeBundle\FormModel\AbstractBadge;
use ant\BadgeBundle\FormModel\NewGroup;

class NewGroupFormHandler extends AbstractBadgeFormHandler
{
    /**
     * Composes a badge from the form data
     *
     * @param AbstractBadge $badge
     * @return BadgeInterface the composed badge 
     * @throws InvalidArgumentException if the badge is not a NewBadge
     */
    public function composeGroup(AbstractBadge $group)
    {
        if (!$group instanceof NewGroup) {
            throw new \InvalidArgumentException(sprintf('Group must be a NewBadge instance, "%s" given', get_class($group)));
        }

        return $this->composer->newGroup()
            ->setName($group->getName())
            ->setClass($group->getClass())
            ->setType($group->getType())
            ->getGroup();
    }
    /**
     * Processes the valid form
     *
     * @param Form
     * @return BadgeInterface
     */
    public function processValidForm(Form $form)
    {
    	$group = $this->composeGroup($form->getData()); // $badge is a NewBadgeBuilder
    
    	return $group;
    }
}

