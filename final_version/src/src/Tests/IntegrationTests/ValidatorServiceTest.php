<?php declare(strict_types=1);

namespace Tests\IntegrationTests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Service\ValidatorService;

final class ValidatorServiceTest extends KernelTestCase {
    private $validatorService;

    protected function setUp(): void {
        self::bootKernel();
        $container = self::$container;
        $this->validatorService = $container->get(ValidatorService::class);
    }

    public function testValidateEmailWithValidData(): void {
        $this->validatorService->validateEmail('test@test.com');

        $this->validatorService->validateEmail('1234@gmail.com');

        $this->validatorService->validateEmail('user@t.com');

        $this->validatorService->validateEmail('user@t.com');

        self::assertTrue(true);
    }

    public function testValidateEmailWithInvalidData1(): void {

        $this->expectException(\Exception::class);

        $this->validatorService->validateEmail('foo');
    }

    public function testValidateEmailWithInvalidData2(): void {
        $this->expectException(\Exception::class);

        $this->validatorService->validateEmail('test@');
    }

    public function testValidateEmailWithInvalidData3(): void {
        $this->expectException(\Exception::class);

        $this->validatorService->validateEmail('test.com');
    }

}