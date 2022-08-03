<?php

namespace App\Form;

use App\Entity\Card;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulaire')
            ->add('montant')
            ->add('numero', null, [
                'label' => "Numero de carte",
            ])
            ->add('expiration', TextType::class, [
                'label' => "date d'expiration (yy-mm)",

//                'widget' => 'single_text',
//                // this is actually the default format for single_text
//                'html5' => false,
//                'format' => 'yyyy-MM',
            ])
            ->add('Cryptogramme')
//            ->add('idUser')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Card::class,
        ]);
    }
}
