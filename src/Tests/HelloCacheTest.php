<?php

namespace Drupal\hello\Tests;

use Drupal;
use Drupal\simpletest\WebTestBase;

class HelloCacheTest extends WebTestBase
{

    public static $modules = ['hello'];

    public static function getInfo()
    {
        return array(
            'name' => 'Hello Cache',
            'description' => 'Demo Cache service',
            'group' => 'Hello',
        );
    }

    public function testCacheSetGetDelete()
    {
        $cache = Drupal::cache();
        $loop = [
            ['hellocache.int', 1],
            ['hellocache.string', 'string'],
            ['hellocache.array', ['Drupal', 'Eight']],
            ['hellocache.object', (object) ['name' => 'Drupal', 'version' => 'Eight']]
        ];

        foreach ($loop as $input) {
            list($cid, $data) = $input;
            $cache->set($cid, $data);
            $this->assertEqual($data, $cache->get($cid)->data);
            $cache->delete($cid);
            $this->assertFalse($cache->get($cid));
        }

        $cids = ['hellocache.int', 'hellocache.string'];
        $cache->set($loop[0][0], $loop[0][1]);
        $cache->set($loop[1][0], $loop[1][1]);

        $cached = $cache->getMultiple($cids);
        $this->assertEqual(
            [$loop[0][1], $loop[1][1]],
            [$cached[$loop[0][0]]->data, $cached[$loop[1][0]]->data]
        );
    }

}
