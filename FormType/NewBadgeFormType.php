<?php

namespace ant\BadgeBundle\FormType;

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
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', 'textarea')
            ->add('name', 'text')
            ->add('image', 'text')
            ->add('count', 'integer')
            ->add('class', 'text')
        	->add('child', 'entity', array(
				'label' =>'Badge:                  ',
				'empty_value'=> '',
				'class' => 'chatea\\ChatBundle\\Entity\\Badge',
				'query_builder' => function ($repositorio) {
				return $repositorio->createQueryBuilder('b')->orderBy('b.name', 'ASC');
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
