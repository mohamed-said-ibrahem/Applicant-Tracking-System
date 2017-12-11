<?php

namespace WorkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;

class ApplicationTypeAdmin extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('middle_name',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('last_name',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))        
        ->add('address',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('email',EmailType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('phone_number',IntegerType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('id_card_number',IntegerType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))        
        ->add('date_available',DateType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))                        
        ->add('desired_salary',IntegerType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('hiring_way',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))        
        ->add('interviewed_before',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))        
        ->add('applied_position',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('is_worked_before',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))                
        ->add('signature',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('technical_test',IntegerType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('iq_test',IntegerType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('technical_comments',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))                
        ->add('technical_result',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))                
        ->add('personality_profile',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))                
        ->add('hr_notes',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))                
        ->add('gm_result',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))                
        ->add('final_decision',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')));
    }

    // public function buildFormAdmin(FormBuilderInterface $builder, array $options)
    // {
    //     $builder->add('first_name')->add('middle_name')->add('last_name')->add('address')->add('email')->add('phone_number')->add('id_card_number')->add('date_available')->add('desired_salary')->add('hiring_way')->add('interviewed_before')->add('applied_position')->add('is_worked_before')->add('signature')->add('technical_test')->add('iq_test')->add('technical_comments')->add('technical_result')->add('personality_profile')->add('hr_notes')->add('gm_result')->add('final_decision');
    // }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WorkBundle\Entity\Application'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'workbundle_application';
    }


}
