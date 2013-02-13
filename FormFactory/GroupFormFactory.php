<?php

namespace Ant\BadgeBundle\FormFactory;

/**
* Instanciates badge forms
*
* @author Pablo <pablo@antweb.es>
*/
class GroupFormFactory extends AbstractBadgeFormFactory
{

    /**
     * Creates a new form.
     * lo utilizamos para recuperar los formularios de editar
     *
     * @return Form
     */
    public function createForm()
    {
    	return $this->formFactory->createNamed($this->formName, $this->formType, null, array());
    	//return $builder = $this->formFactory->createNamed($this->formName, $this->formType, null);
    	
    	//return $builder->getForm();
    }
}