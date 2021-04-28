<?php declare(strict_types=1);

namespace Tests\ApplicationTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ProductControllerTest extends WebTestCase {
    private $client;

    protected function setUp(): void {
        $this->client = static::createClient();
    }

    public function testGetProductsAction() {
        $crawler = $this->client->request('GET', '/products');

        $this->assertResponseIsSuccessful();

        $this->assertResponseHeaderSame('Content-Type', 'application/json');

        $responseContent = json_decode($this->client->getResponse()->getContent());

        $this->assertIsArray($responseContent);
    }

}