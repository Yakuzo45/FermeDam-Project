<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Email', EmailType::class, [
                'label' => 'Votre adresse e-mail :',
                'attr' => [
                    'class' => 'formEmail'
                ]
            ])
            ->add('Object', TextType::class, [
                'label' => 'Objet du message :',
                'attr' => [
                    'class' => 'formObject'
                ]
            ])
            ->add('Message', TextareaType::class, [
                'label' => 'Message :',
                'attr' => [
                    'class' => 'formMessage'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
