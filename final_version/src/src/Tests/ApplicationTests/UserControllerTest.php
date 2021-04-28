<?php declare(strict_types=1);

namespace Tests\ApplicationTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

final class UserControllerTest extends WebTestCase {
    private $client;

    protected function setUp(): void {
        $this->client = static::createClient();
    }

    public function testPostRegistrationActionSuccessful() {
        $this->client->request('POST', '/registration', [
            'email' => 'test@test.com',
            'username' => 'testuser',
            'password' => 'testpassword1234'
        ]);

        $this->assertResponseIsSuccessful();
    }

    public function testPostRegistrationActionFailed() {
        $this->client->request('POST', '/registration', [
            'email' => 'test@test.com',
            'username' => 'testuser',
            'password' => 'test'
        ]);

        $this->assertResponseStatusCodeSame(Response::HTTP_BAD_REQUEST);
    }

    public function testPostLoginActionSuccessful() {
        $this->client->request('POST', '/login', [
            'email' => 'test@test.com',
            'password' => 'test1234'
        ]);

        $this->assertResponseIsSuccessful();
    }

    public function testPostLoginActionFailed() {
        $this->client->request('POST', '/login', [
            'email' => 'test@test.com',
            'password' => 'test'
        ]);

        $this->assertResponseStatusCodeSame(Response::HTTP_UNAUTHORIZED);
    }

}