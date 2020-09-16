<?php

declare(strict_types=1);

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTests extends WebTestCase
{
    /** @test */
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /** @test */
    public function testCitySearch()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        
        $form = $crawler->selectButton('submit')->form();
        $form['search'] = 'Madrid';
        $crawler = $client->submit($form);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSelectorTextContains('body > div.container.mb-5.pb-5.h-75 > div > div.d-flex.mb-2 > div.align-middle.my-auto.w-100 > h1', 'Madrid');
    }
}
