<?php

namespace App\Form;

use App\Entity\VenueSeatingPlan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class VenueSeatingPlanType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('translations', TranslationsType::class, [
                    'label' => 'Translation',
                    'fields' => [
                        'name' => [
                            'purify_html' => true,
                            'locale_options' => [
                                'en' => ['label' => 'Name'],
                                'fr' => ['label' => 'Nom'],
                                'es' => ['label' => 'Nombre'],
                                'ar' => ['label' => 'اسم'],
                                'pt' => ['label' => 'Nome do menu'],
                                'de' => ['label' => 'Menüname'],
                                'it' => ['label' => 'Nome'],
                                'br' => ['label' => 'Nome'],
                            ]
                        ],
                    ],
                    'excluded_fields' => ['slug']
                ])
                ->add('design', HiddenType::class, [
                    "mapped" => false
                ])
                ->add('save', SubmitType::class, [
                    'label' => 'Save',
                    'attr' => ['class' => 'btn btn-primary'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => VenueSeatingPlan::class,
        ]);
    }
}
