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
class NewBadgeFormType extends AbstractType
{
	private $groupClass;
	
	public function __construct($groupClass)
	{
		$this->groupClass = $groupClass;
	}
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', 'textarea')
            ->add('name', 'text')
            ->add('image', 'text')
            ->add('count', 'integer')
        	->add('badgeGroup', 'entity', array(
				'label' =>'Group: ',
				'empty_value'=> '',
				'class' => $this->groupClass,
				'query_builder' => function ($repositorio) {
				return $repositorio->createQueryBuilder('g')->orderBy('g.name', 'ASC');
				}, ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'intention'  => 'badge',
        	
        ));
    }

    public function getName()
    {
        return 'ant_badge_new_badge';
    }
}
