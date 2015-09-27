<?php

namespace OptcRestApi\Bundles\RESTBundle\DependencyInjection\CompilerPass;

use Mmoreram\SimpleDoctrineMapping\CompilerPass\Abstracts\AbstractMappingCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * MappingCompilerPass
 *
 * @author Sergio de Candelario <hadesbcn@gmail.com>
 */
class MappingCompilerPass extends AbstractMappingCompilerPass
{
    private static $classes = array(
        'OptcRestApi\Components\Character\Entity\Character',
    );

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        foreach (self::$classes as $class) {
            preg_match('/(\\w+)$/', $class, $matches);
            $this
                ->addEntityMapping(
                    $container,
                    'default',
                    $class,
                    "@RESTBundle/Resources/config/doctrine/$matches[0].orm.yml"
                );
        }
    }
}