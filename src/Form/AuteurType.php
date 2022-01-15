<?php

namespace App\Form;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\Date;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',null,[
                'label'=>false,
                'attr'=>[
                    'placeHolder'=>'entrer le nom de l\'auteur',
                    'class'=>'uk-input uk-form-width-large'
                ]
            ])

            ->add('prenom',null,[
                'label'=>false,
                'attr'=>[
                    'placeHolder'=>'entrer le prenom de l\'auteur',
                    'class'=>'uk-input uk-form-width-large'
                ]
            ])

            ->add('sexe',ChoiceType::class,[
                "choices"=>[
                        "Female"=>'F',
                        "Male"=>'M'
                ],
                "label"=>false,
                "attr"=>[
                    'class'=>'uk-select uk-form-width-large'
                ]
                    
            ])
            
            ->add('date_de_naissance',DateType::class,[
                'widget' => 'single_text',
                'attr'=> [
                    'class'=>'uk-input uk-form-width-large'
                ],
                'label'=>false
            ])

            ->add('nationalite',CountryType::class,[
                'label'=>false,
                'attr'=>[
                    'placeHolder'=>'nationalité',
                    'class'=>'uk-input uk-form-width-large'
                ]
            ])

            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}

