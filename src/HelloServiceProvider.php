<?php

namespace Drupal\hello;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Symfony\Component\DependencyInjection\Definition;

class HelloServiceProvider extends ServiceProviderBase
{

    public function alter(ContainerBuilder $container)
    {
        // Register dynamic service
        $container->register('hello.service_dynamic', 'Drupal\\hello\\DynamicService');
    }

}
