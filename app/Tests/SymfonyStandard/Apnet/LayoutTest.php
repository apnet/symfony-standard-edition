<?php

/**
 * Test common layout
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Tests\SymfonyStandard\Apnet;

use Apnet\FunctionalTestBundle\Framework\WebTestCase;

/**
 * Test common layout
 */
class LayoutTest extends WebTestCase
{

  /**
   * Test LayoutBundle
   *
   * @return null
   */
  public function testStaticCollection()
  {
    $client = self::createClient();

    $client->request("GET", "/apnet-layout-demo.html");
    $response = $client->getResponse();

    $this->assertEquals(200, $response->getStatusCode());
  }

}
