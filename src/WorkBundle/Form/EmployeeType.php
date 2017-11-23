<?php

namespace WorkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nameArabic')->add('nameEnglish')->add('birthDate')->add('address')->add('homePhone')->add('mobilePhone')->add('emergencyContactPerson')->add('emergencyPersonNumber')->add('emailPersonal')->add('idCardNumber')->add('academicDegree')->add('graduationDate')->add('joiningDate')->add('currentPosition');
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
