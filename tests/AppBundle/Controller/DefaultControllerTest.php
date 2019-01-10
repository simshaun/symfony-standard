<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $formData = [
            'product' => [
                'features' => [
                    ['settings' => json_encode(['foo' => '1', 'bar' => '2'])],
                    ['settings' => json_encode(['foo' => '3', 'bar' => '4'])],
                ],
            ],
        ];

        $client->request('POST', '/', $formData);

        $this->assertContains('Success!', $client->getResponse()->getContent());
    }
}
