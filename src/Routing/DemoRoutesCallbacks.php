<?php

namespace Drupal\hello\Routing;

use Symfony\Component\Routing\Route;

class DemoRoutesCallbacks
{

    public function getRoutes()
    {
        $routes = [];

        $routes['hello.dynamic_route'] = new Route(
            '/hello_dynamic/{name}',
            [
                '_title' => 'Dynamic route @demo',
                '_title_arguments' => ['@demo' => 'Demonstration'],
                '_content' => 'Drupal\\hello\\Controller\SimpleCallback::sayHiAction',
                'name' => 'Dynamic Routing…',
            ],
            ['_permission' => 'access content']
        );

        return $routes;
    }

}
