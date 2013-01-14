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
    protected $badgeClass;

    public function __construct(FormFactoryInterface $formFactory, AbstractType $formType, $formName, $badgeClass)
    {
        $this->formFactory = $formFactory;
        $this->formType = $formType;
        $this->formName = $formName;
        $this->badgeClass = $badgeClass;
       // $this->badgeClass = 'ant\BadgeBundle\FormModel\NewBadge';
    }

    /**
     * Creates a new instance of the form model
     *
     * @return AbstractBadge
     */
    protected function createModelInstance()
    {
        $class = $this->badgeClass;

        return new $class();
    }
}
