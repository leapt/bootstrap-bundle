<?php

namespace Leapt\BootstrapBundle\Twig\Extension;

use Symfony\Component\Form\Util\PropertyPath;

/**
 * Class BootstrapExtension
 * @package Leapt\BootstrapBundle\Twig\Extension
 */
class BootstrapExtension extends \Twig_Extension
{
    /**
     * @var \Twig_Environment
     */
    protected $environment;

    public function initRuntime(\Twig_Environment $environment)
    {
        $this->environment = $environment;
    }


    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('form_row_classes', array($this, 'getFormRowClasses'))
        );
    }

    public function getFormRowClasses(array $types) {
        return implode(' ', array_map(function($type){
            return 'type_' . $type;
        }, $types));
    }


    public function getName()
    {
        return 'leapt_bootstrap';
    }
}
