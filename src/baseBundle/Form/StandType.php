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
            ->add('statutStand',ChoiceType::class,array('choices'=>array('Unavailable'=>'0','Available'=>'1')) )
            ->add('description',ChoiceType::class,array('choices'=>array(
                'Size = 3.0 x 2.0m  --  Price = 100 TND'=>'Size = 3.0 x 2.0m  --  Price = 100 TND','Size = 3.0 x 2.5m  --  Price = 110 TND'=>'Size = 3.0 x 2.5m  --  Price = 110 TND'
            ,'Size = 3.0 x 3.0m  --  Price = 120 TND'=>'Size = 3.0 x 3.0m  --  Price = 120 TND','Size = 4.0 x 2.0m  --  Price = 150 TND'=>'Size = 4.0 x 2.0m  --  Price = 150 TND'
            ,'Size = 4.0 x 2.5m  --  Price = 160 TND'=>'Size = 4.0 x 2.5m  --  Price = 160 TND','Size = 4.0 x 3.0m  --  Price = 170 TND'=>'Size = 4.0 x 3.0m  --  Price = 170 TND')) );

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