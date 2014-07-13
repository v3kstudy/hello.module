<?php

namespace Drupal\hello\Tests;

use Drupal\simpletest\DrupalUnitTestBase;

class ServiceContainerTest extends DrupalUnitTestBase
{

    public static $modules = ['hello'];

    public static function getInfo()
    {
        return array(
            'name' => 'Try Service Container',
            'description' => 'for DIC…',
            'group' => 'Hello',
        );
    }

    public function testGetServices()
    {
        $container = \Drupal::getContainer();
        $this->assertEqual('Drupal\\hello\\StaticService', get_class($container->get('hello.static_service')));
        $this->assertEqual('Drupal\\hello\\DynamicService', get_class($container->get('hello.service_dynamic')));
    }

}
