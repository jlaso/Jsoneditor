<?php

// src/Acme/DemoBundle/Form/Type/GenderType.php
namespace Jlaso\JsoneditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
            'compound'          => true,
            'expanded'          => true,
            'label'             => false,
            'label_attr'        => array('class' => 'hidden'),
            'model_manager'     => null,
            'modifiable'        => true,
            'multiple'          => true,
            'property'          => null,
            'default'           => null
        ));
    }

}

