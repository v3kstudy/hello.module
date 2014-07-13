<?php

namespace Drupal\hello\Subscriber;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase
{

    protected function alterRoutes(RouteCollection $collection)
    {
        if ($route = $collection->get('hello.sayHi')) {
            $route->setDefault('name', 'Andy Truong');
        }
    }

}
