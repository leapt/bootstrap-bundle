<?php

namespace Leapt\BootstrapBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class HelpTypeExtension
 * @package Leapt\BootstrapBundle\Form\Extension
 */
class HelpTypeExtension extends AbstractTypeExtension
{
    /**
     * @param \Symfony\Component\OptionsResolver\OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefined(array('help_block', 'help_inline'))
            ->setAllowedTypes('help_block', 'string')
            ->setAllowedTypes('help_inline', 'string')
        ;
    }

    /**
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (isset($options['help_block']) && isset($options['help_inline'])) {
            throw new \UnexpectedValueException('Cannot set both "help_block" and "help_inline" options');
        }
        elseif (isset($options['help_block'])) {
            $view->vars['help'] = true;
            $view->vars['help_block'] = $options['help_block'];

        }
        elseif (isset($options['help_inline'])) {
            $view->vars['help'] = true;
            $view->vars['help_inline'] = $options['help_inline'];
        }
        else {
            $view->vars['help'] = false;
        }
    }

    /**
     * @return string
     */
    public function getExtendedType()
    {
        return FormType::class;
    }
}