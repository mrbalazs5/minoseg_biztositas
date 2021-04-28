<?php declare(strict_types=1);

namespace Tests\IntegrationTests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Service\ProductService;
use Entity\ProductInterface;

final class ProductServiceTest extends KernelTestCase {
    private $productService;

    protected function setUp(): void {
        self::bootKernel();
        $container = self::$container;
        $this->productService = $container->get(ProductService::class);
    }

    public function testGetProducts(): void {
        $products = $this->productService->getProducts();

        $this->assertIsArray($products);
        $this->assertTrue(count($products) > 0);
        $this->assertInstanceOf(ProductInterface::class, $products[0]);
    }

}