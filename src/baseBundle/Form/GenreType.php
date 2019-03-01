<?php

namespace baseBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add ( 'id_Genre')
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Decore' => "1",
                    'Jardinage' => "0"
                ],
                'attr' => array("label" => "cccc")
            ])
            ->add('pays', ChoiceType::class, [
                'choices'  => [
                    '1' => "tunis",
                    '0' => "Eur"
                ],
                'attr' => array("label" => "cccc")
            ])->add ('Submit',SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'baseBundle\Entity\Genre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'basebundle_Genre';
    }
}
