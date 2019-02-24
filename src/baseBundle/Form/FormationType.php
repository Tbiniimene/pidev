<?php

namespace baseBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FormationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type',ChoiceType::class,array(
            'choices'=>array(
                'Agricult'=>'Agricult',
                'Bio'=>'Bio',
                'Nutrition'=>'Nutrition'
            )
        ))->add('nom')->add('prix')
            ->add('dateDeb')->add('dateFin')->add('Formateur')
            ->add('Formateur',EntityType::class,array(
                'class'=>'baseBundle:Formateur',
                'choice_label'=>'nom',
                'multiple'=>false))->add('description')->add('addresse')->add('img',FileType::class,array('data_class' => null))->add('nbmax')
            ->add('save',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'baseBundle\Entity\Formation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'formationbundle_formation';
    }


}
