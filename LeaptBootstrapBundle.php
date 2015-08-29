<?php

namespace Leapt\BootstrapBundle;

use Leapt\BootstrapBundle\DependencyInjection\Compiler\PaginatorCompilerPass;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class LeaptBootstrapBundle
 * @package Leapt\BootstrapBundle
 */
class LeaptBootstrapBundle extends Bundle
{
    /**
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new PaginatorCompilerPass());
    }
}
