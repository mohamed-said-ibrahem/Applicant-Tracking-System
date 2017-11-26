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


class EmployeeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nameArabic',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('nameEnglish',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('birthDate',BirthdayType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))        
        ->add('address',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('homePhone',IntegerType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('mobilePhone',IntegerType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('emergencyContactPerson',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))        
        ->add('emergencyPersonNumber',IntegerType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))        
        ->add('emailPersonal',EmailType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('idCardNumber',IntegerType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))        
        ->add('academicDegree',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))
        ->add('graduationDate',BirthdayType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))                
        ->add('joiningDate',DateType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')))                        
        ->add('currentPosition',TextType::class,array('attr'=>array('class'=>'form-control col-xs-10 col-sm-5', 'style' => 'margin-bottom:10px')));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WorkBundle\Entity\Employee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'workbundle_employee';
    }


}
