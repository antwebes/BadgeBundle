<?php

namespace ant\BadgeBundle\FormFactory;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormFactoryInterface;
use ant\BadgeBundle\FormModel\AbstractBadge;

/**
 * Instanciates badge forms
 *
 * @author Pablo  <pablo@antweb.es>
 */
abstract class AbstractBadgeFormFactory
{
    /**
     * The Symfony form factory
     *
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * The badge form type
     *
     * @var AbstractType
     */
    protected $formType;

    /**
     * The name of the form
     *
     * @var string
     */
    protected $formName;

    /**
     * The FQCN of the badge model
     *
     * @var string
     */
    protected $messageClass;

    public function __construct(FormFactoryInterface $formFactory, AbstractType $formType, $formName, $messageClass)
    {
        $this->formFactory = $formFactory;
        $this->formType = $formType;
        $this->formName = $formName;
        $this->messageClass = $messageClass;
    }

    /**
     * Creates a new instance of the form model
     *
     * @return AbstractBadge
     */
    protected function createModelInstance()
    {
        $class = $this->messageClass;

        return new $class();
    }
}
