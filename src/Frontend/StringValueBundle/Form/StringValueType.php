<?php

namespace Frontend\StringValueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StringValueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('labelValue')
            ->add('type')
            ->add('quantity')
            ->add('createdUser')
            ->add('modifiedUser')
            ->add('createdDate', 'datetime')
            ->add('modifiedDate', 'datetime')
            ->add('active')
            ->add('deleted')
            ->add('stringKey')
            ->add('lang')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\StringValueBundle\Entity\StringValue'
        ));
    }
}
