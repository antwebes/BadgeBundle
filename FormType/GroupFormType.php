<?php

namespace ant\BadgeBundle\FormType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * form type for edit a new group
 *
 * @author Pablo <pablo@antweb.es>
 */
class GroupFormType extends AbstractType
{
	private $groupClass;
	
	public function __construct($groupClass)
	{
		$this->groupClass = $groupClass;
	}
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('class', 'text')
            ->add('name', 'text')
            ->add('type', 'text');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'intention'  => 'group',
        	'data_class' => $this->groupClass,
        ));
    }

    public function getName()
    {
        return 'ant_badge_group';
    }
}
