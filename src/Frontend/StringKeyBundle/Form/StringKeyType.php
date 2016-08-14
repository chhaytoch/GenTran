<?php

namespace Frontend\StringKeyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StringKeyType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keyLabel', 'text', array(
                'label'=>'Key String',
                'attr'=>array('class'=>'form-control')
            ))
//            ->add('os', 'entity', array(
//                'class'     => 'Frontend\OperatingSystemBundle\Entity\OperatingSystem',
//                'property'  => 'osName',
//                'multiple'  => true,
//                'expanded'  => false
//            ))
            ->add('context', 'entity', array(
                'class'     => 'Frontend\ContextBundle\Entity\Context',
                'property'  => 'name',
                'multiple'  => false,
                'expanded'  => false,
                'attr'=>array('class'=>'form-control')
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\StringKeyBundle\Entity\StringKey'
        ));
    }
}
