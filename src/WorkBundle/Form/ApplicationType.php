<?php

namespace WorkBundle\Form;

use WorkBundle\Entity\Degree;

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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Form\Type\DegreeType;


class ApplicationType extends AbstractType
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
        ->add('signature',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')));   
    }

    
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
