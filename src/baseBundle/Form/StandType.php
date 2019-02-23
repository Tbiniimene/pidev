<?php

namespace baseBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class StandType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEvent',EntityType::class,
                array('class'=>'baseBundle:Evenement',
                    'choice_label'=>'nom',
                    'multiple'=>false))
            ->add('statutStand')
            ->add('description',ChoiceType::class,array('choices'=>array(
                '200 x 100mm'=>'200 x 100mm','200 x 150mm'=>'200 x 150mm','200 x 200mm'=>'200 x 200mm','300 x 100mm'=>'300 x 100mm','300 x 150mm'=>'300 x 150mm','300 x 200mm'=>'300 x 200mm')) );

    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'baseBundle\Entity\Stand'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'baseBundle_event';
    }


}