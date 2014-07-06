<?php

namespace Drupal\hello\Tests;

use Drupal\simpletest\DrupalUnitTestBase;

class HelloTest extends DrupalUnitTestBase
{

    public static $modules = ['hello'];

    public static function getInfo()
    {
        return array(
            'name' => 'Hello functionality',
            'description' => 'No functionality tested. Just say hello to all.',
            'group' => 'Hello',
        );
    }

    /**
     * @group hello
     */
    public function testHello()
    {
        $this->assertTrue(true, 'Yeah, just a TRUE!');
    }

}
