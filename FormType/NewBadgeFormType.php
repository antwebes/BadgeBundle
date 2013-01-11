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
            ->add('image', 'text');
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
