<?php declare(strict_types=1);

namespace Tests\UnitTests;

use PHPUnit\Framework\TestCase;
use Entity\ProductInterface;
use Entity\Product;

final class ProductTest extends TestCase {

    public function testCanBeCreatedFromValidData(): void {
        $product = new Product();
        $product->setName("alma");
        $product->setPrice(400);
        $product->setCategory(ProductInterface::OTHER);

        $this->assertInstanceOf(
            ProductInterface::class,
            $product
        );
    }

    public function testCannotBeCreatedFromInvalidData(): void {
        $this->expectException(\TypeError::class);

        $product = new Product();
        $product->setName(5);
        $product->setPrice(400);
        $product->setCategory(ProductInterface::OTHER);
    }

}