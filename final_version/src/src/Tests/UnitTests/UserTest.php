<?php declare(strict_types=1);

namespace Tests\UnitTests;

use PHPUnit\Framework\TestCase;
use Entity\UserInterface;
use Entity\User;

final class UserTest extends TestCase {

    private $user;

    protected function setUp(): void {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setUserName("testuser");
        $user->setPassword("testpass");

        $this->user = $user;
    }

    public function testCanBeCreatedFromValidData(): void {
        $this->assertInstanceOf(
            UserInterface::class,
            $this->user
        );
    }

    public function testCannotBeCreatedFromInvalidData(): void {
        $this->expectException(\TypeError::class);
        
        $user = new User();
        $user->setEmail(1234);
        $user->setUserName("testuser");
        $user->setPassword("testpass");
    }

    public function testIfUserPasswordIsEncrypted(): void {
        $this->assertNotEmpty($this->user->getPassword());
        $this->assertNotEquals($this->user->getPassword(), "testpass");
    }

    public function testVerifyPasswordFunction(): void {
        $this->assertTrue(User::verifyPassword("testpass", $this->user->getPassword()));
    }

}