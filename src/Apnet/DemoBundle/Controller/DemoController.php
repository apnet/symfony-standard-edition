<?php

namespace Apnet\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
  /**
   * @Route("/", name="_apnet_demo_index")
   * @Template()
   */
  public function indexAction()
  {
    return array();
  }

}
