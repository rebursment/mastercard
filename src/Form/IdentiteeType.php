<?php

namespace App\Form;

use App\Entity\Identitee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdentiteeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('mail')
            ->add('telephone')
            ->add('adresse')
            ->add('ville')
            ->add('code_postal')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Identitee::class,
        ]);
    }
}
