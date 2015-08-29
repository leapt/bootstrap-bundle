<?php

namespace Leapt\BootstrapBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class PaginatorCompilerPass
 * @package Leapt\BootstrapBundle\DependencyInjection\Compiler
 */
class PaginatorCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('leapt_core.twig_paginator')) {
            return;
        }

        $definition = $container->getDefinition('leapt_core.twig_paginator');
        $definition->addMethodCall('setTemplate', array('LeaptBootstrapBundle:Paginator:paginator_bootstrap_layout.html.twig'));
    }
}