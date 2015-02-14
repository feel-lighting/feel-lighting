<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;


class ContactType extends AbstractType
{
    private $securityContext;

    public function __construct(SecurityContext $securityContext)
    {
        $this->securityContext = $securityContext;
    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'contactform.name'))
            ->add('email', 'email', array('label' => 'contactform.email'))
            ->add('text', 'textarea', array('label' => 'contactform.text'))
            ->add('submit', 'submit', array('label' => 'contactform.submit'));

        $security = $this->securityContext;

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($security) {
                $contact = $event->getData();
                $form = $event->getForm();

                $contact->setCreatedAt(new \DateTime('now'));

                if ($security->isGranted('ROLE_USER')) {

                    $user = $security->getToken()->getUser();
                    $form->remove('name');
                    $form->remove('email');
                    $contact->setName($user->getUsername());
                    $contact->setEmail($user->getEmail());
                }
            }
        );

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'AppBundle\Entity\Contact',
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_contacttype';
    }
}
