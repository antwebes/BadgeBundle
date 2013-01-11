<?php

namespace ant\BadgeBundle\FormFactory;

/**
* Instanciates badge forms
*
* @author Pablo <pablo@antweb.es>
*/
class NewBadgeFormFactory extends AbstractBadgeFormFactory
{
    /**
	* Creates a new badge
	*
	* @return Form
	*/
    public function create()
    {
        $message = $this->createModelInstance();

        return $this->formFactory->createNamed($this->formName, $this->formType, $message);
    }
}