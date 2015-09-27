<?php

namespace OptcRestApi\Bundles\RESTBundle;

use OptcRestApi\Bundles\RESTBundle\DependencyInjection\CompilerPass\MappingCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class RESTBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new MappingCompilerPass());
    }
}
