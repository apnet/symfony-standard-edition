<?php

namespace AppBundle\Tests\Controller;

use Apnet\FunctionalTestBundle\Framework\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testLegacyIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
