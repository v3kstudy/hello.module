<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Cache\DatabaseBackend;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\user\UserAutocomplete;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MyController implements ContainerInjectionInterface
{

    /**
     * @var CacheBackendInterface
     */
    private $cache;

    /**
     * Constructs an UserAutocompleteController object.
     *
     * @param UserAutocomplete $user_autocomplete
     *   The user autocomplete helper class to find matching user names.
     */
    public function __construct(DatabaseBackend $cache)
    {
        $this->cache = $cache;
    }

    public function myAction(Request $request)
    {
        $this->cache->set('mycontroller.key', 'there');
        return new Response('Hi ' . $this->cache->get('mycontroller.key')->data . '!');
    }

    /**
     * {@inheritdoc}
     */
    public static function create(ContainerInterface $container)
    {
        # print_r([$container->get('cache.default')]); exit;

        return new static(
            $container->get('cache.default')
        );
    }

}
