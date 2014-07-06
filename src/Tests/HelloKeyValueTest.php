<?php

namespace Drupal\hello\Tests;

use Drupal\simpletest\WebTestBase;

class HelloKeyValueTest extends WebTestBase
{

    public static $modules = ['hello'];

    public static function getInfo()
    {
        return array(
            'name' => 'Hello Key-Value',
            'description' => 'Demo Key-Value service',
            'group' => 'Hello',
        );
    }

    public function testService()
    {
        $kv = \Drupal::keyValue('hellotest');
        $this->assertTrue($kv instanceof \Drupal\Core\KeyValueStore\KeyValueStoreInterface);
        $this->assertEqual('hellotest', $kv->getCollectionName());
    }

    public function testSetGetDelete()
    {
        $kv = \Drupal::keyValue('hellotest');
        $kv->set('name', 'Drupal 8');
        $this->assertEqual('Drupal 8', $kv->get('name'));
        $kv->delete('name');
        $this->assertNull($kv->get('name'));
    }

    public function testOpMultiple()
    {
        $array = ['name' => 'Drupal', 'version' => 'Eight'];
        $kv = \Drupal::keyValue('hellotest');
        $kv->setMultiple($array);
        $this->assertEqual($array, $kv->getMultiple(array_keys($array)));
    }

}
