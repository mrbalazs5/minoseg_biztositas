<?php declare(strict_types=1);

namespace Tests\ApplicationTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class HomeControllerTest extends WebTestCase {
    private $client;

    protected function setUp(): void {
        $this->client = static::createClient();
    }

    public function testIndexAction() {
        $crawler = $this->client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Welcome');

        $this->assertCount(1, $crawler->filter('html'));
    }

}