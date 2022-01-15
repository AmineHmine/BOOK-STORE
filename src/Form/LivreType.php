<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isbn',null,[
                'label'=>false,
                'attr'=>[
                    'placeHolder'=>'entrer le ISBN du livre',
                    'class'=>'uk-input uk-form-width-large'
                ]
            ])
            ->add('titre',null,[
                'label'=>false,
                'attr'=>[
                    'placeHolder'=>'entrer le titre du livre',
                    'class'=>'uk-input uk-form-width-large'
                ]
            ])
            ->add('nombre_pages',null,[
                'label'=>false,
                'attr'=>[
                    'placeHolder'=>'entrer le nombre du page',
                    'class'=>'uk-input uk-form-width-large'
                ]
            ])
            ->add('date_de_parution',DateType::class,[
                'widget' => 'single_text',
                'attr'=> [
                    'class'=>'uk-input uk-form-width-large'
                ],
                'label'=>false
            ])
            ->add('note',ChoiceType::class,[
                "choices"=>[
                        "1"=>'1',"2"=>'2',"3"=>'3',"4"=>'4',"5"=>'5',"6"=>'6',"7"=>'7',"8"=>'8',"9"=>'9',"10"=>'10',"11"=>'11',"12"=>'12',"13"=>'13',"14"=>'14',"15"=>'15',"16"=>'16',"17"=>'17',"18"=>'18',"19"=>'19',"20"=>'20'
                ],
                "label"=>false,
                "attr"=>[
                    'class'=>'uk-select uk-form-width-large'
                ]
                    
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
