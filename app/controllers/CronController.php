<?php 

namespace Griff;

use Symfony\Component\HttpFoundation\Request;

class CronController extends CoreController
{

    public function index(Request $request, Application $app) {
      echo 'here'; exit;
    }

}
