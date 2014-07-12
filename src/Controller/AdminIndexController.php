<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

class AdminIndexController extends ControllerBase
{

    public function helloAdminAction()
    {
        return ['#markup' => 'Hello Admin!'];
    }

}
