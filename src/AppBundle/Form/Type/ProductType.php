<?php

namespace ZIMZIM\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use ZIMZIM\CategoryProductBundle\Doctrine\ProductManager;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('feature', 'zimzim_toolsbundle_zimzimtinymce')
            ->add('listing', 'zimzim_toolsbundle_zimzimtinymce')
            ->add('specification', 'zimzim_toolsbundle_zimzimtinymce');
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_producttype';
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return 'zimzim_categoryproductbundle_producttype';
    }
}
