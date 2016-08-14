<?php

namespace Frontend\ContextBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContextType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                    'attr'=>array('class'=>'form-control')
            ))
            ->add('description', 'textarea', array(
                'required'=> false,
                'attr'=>array('class'=>'form-control')
            ))
            ->add('imagePath')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContextBundle\Entity\Context'
        ));
    }
}
