<?php

namespace baseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class MaterielsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('nom')
            ->add('prix')

            ->add('qte')
            ->add('statut')
            ->add('file')
        ->add('statut', ChoiceType::class, [
            'choices'  => [
                'oui' => "1",
                'non' => "0"
            ],
            'attr' => array("label" => "cccc")
        ])
            ->add('categorie', EntityType::class, [
                // looks for choices from this entity
                'class' => 'baseBundle:Categorie',

                // uses the User.username property as the visible option string
                'choice_label' => 'nom',

                'attr'=>array('class'=>'form-control')

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ]);
         ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'baseBundle\Entity\Materiels'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'basebundle_materiels';
    }


}
