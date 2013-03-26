<?php

// src/Acme/DemoBundle/Form/Type/GenderType.php
namespace Jlaso\JsoneditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class JsoneditorType extends AbstractType
{

    public function getParent()
    {
        return 'text';
    }

    public function getName()
    {
        return 'jlaso_json_editor';
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

        $resolver->setDefaults(array(
            'allow_add'         => true,
            'allow_delete'      => true,
            'by_reference'      => false,
            //'compound'          => true,
            //'expanded'          => true,
            //'label'             => false,
            //'label_attr'        => array('class' => 'hidden'),
            //'multiple'          => true,
            //'property'          => null,
            //'default'           => null
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'allow_add'    => $options['allow_add'],
            'allow_delete' => $options['allow_delete'],
        ));
    }

}

