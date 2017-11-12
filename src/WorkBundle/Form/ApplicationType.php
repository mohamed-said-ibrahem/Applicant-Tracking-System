<?php

namespace WorkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name')->add('middle_name')->add('last_name')->add('address')->add('email')->add('phone_number')->add('id_card_number')->add('date_available')->add('desired_salary')->add('hiring_way')->add('interviewed_before')->add('applied_position')->add('is_worked_before')->add('signature')->add('technical_test')->add('iq_test')->add('technical_comments')->add('technical_result')->add('personality_profile')->add('hr_notes')->add('gm_result')->add('final_decision')->add('Education');
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
