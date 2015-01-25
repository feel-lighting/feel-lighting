<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'contactform.name'))
            ->add(
                'category',
                'choice',
                array(
                    'choices' => array(
                        'contact' => 'contactform.categorychoice.contact',
                        'support' => 'contactform.categorychoice.support',
                    ),
                    'empty_value' => false,
                    'label' => 'contactform.category'
                )
            )
            ->add('text', 'textarea')
            ->add('submit', 'submit', array('label' => 'contactform.submit'));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_contacttype';
    }
}
