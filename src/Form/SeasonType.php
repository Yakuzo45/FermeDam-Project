<?php

namespace App\Form;

use App\Entity\Seasons;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SeasonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('selectSeason', EntityType::class, [
                'class' =>  Seasons::class,
                'choice_label' => 'name',
                'label' => ' ',
                'attr' =>[
                    'class' => 'selectSeason'
                ]
            ])
        ;
    }

}
