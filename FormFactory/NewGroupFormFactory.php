<?php

namespace ant\BadgeBundle\FormFactory;

/**
* Instanciates badge forms
*
* @author Pablo <pablo@antweb.es>
*/
class NewGroupFormFactory extends AbstractBadgeFormFactory
{
    /**
	* Creates a new group
	*
	* @return Form
	*/
    public function create()
    {
    	$group = $this->createModelInstance();
    	
    	return $this->formFactory->createNamed($this->formName, $this->formType, $group);

    }
}