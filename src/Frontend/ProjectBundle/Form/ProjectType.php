<?php

namespace Frontend\ProjectBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('projectName', 'text', array(
                'attr'      => array('class'=>'form-control')
            ))
            ->add('description', 'textarea', array(
                'attr'      => array('class'=>'form-control'),
                'required'  => false
            ))
            ->add('lang', 'entity', array(
                'class'     => 'Frontend\LangBundle\Entity\Lang',
                'property'  => 'langName',
                'multiple'  => true,
                'expanded'  => false,
                'label'     => 'Language (Hold Ctrl + Click)',
                'attr'      => array('class'=>'form-control')
            ))
            ->add('os', 'entity', array(
                'class'     => 'Frontend\OperatingSystemBundle\Entity\OperatingSystem',
                'property'  => 'osName',
                'multiple'  => true,
                'expanded'  => false,
                'label'     => 'Operating System (Hold Ctrl + Click)',
                'label_attr'=> array('class'=>'label-style'),
                'attr'      => array('class'=>'form-control')
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ProjectBundle\Entity\Project'
        ));
    }
}
