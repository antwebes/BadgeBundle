<?php

namespace Ant\BadgeBundle\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * form type for create a new badge
 *
 * @author Pablo <pablo@antweb.es>
 */
class BadgeFormType extends AbstractType
{
	private $badgeClass;
	
	public function __construct($badgeClass)
	{
		$this->badgeClass = $badgeClass;
	}
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', 'textarea')
            ->add('name', 'text')
            ->add('image', 'text')
        	->add('image_icon', 'text');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'intention'  => 'badge',
        	'data_class' => $this->badgeClass,
        ));
    }

    public function getName()
    {
        return 'ant_badge_badge';
    }
}
