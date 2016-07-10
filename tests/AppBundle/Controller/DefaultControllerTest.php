<?php

namespace Tests\AppBundle\Controller;

use Apnet\FunctionalTestBundle\Framework\WebTestCase;
use Apnet\FunctionalTestBundle\Framework\Client;
use AppBundle\Tests\DataFixtures;

/**
 * Class DefaultControllerTest
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * Test access to index page
     *
     * @return null
     */
    public function testLegacyIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * {@inheritdoc}
     */
    protected static function setDefaultClientUp(Client $client)
    {
        parent::setDefaultClientUp($client);
        /*
        $client->loadFixtures(
            array(
                new DataFixtures\User\Andrey(),
            )
        );

        $client->setServerParameters(
            array(
                'PHP_AUTH_USER' => 'andrey',
                'PHP_AUTH_PW' => 'qwerty'
            )
        );
        */
    }
}
