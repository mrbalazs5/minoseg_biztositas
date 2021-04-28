<?php declare(strict_types=1);

namespace Service;

use Entity\Product;
use Entity\ProductInterface;

class ProductService {
    public function getProducts(): array {
        $product1 = new Product();
        $product1->setName("sapka");
        $product1->setPrice(2500);

        $product2 = new Product();
        $product2->setName("szobabicikli");
        $product2->setPrice(80000);
        $product2->setCategory(ProductInterface::SPORT);

        $product3 = new Product();
        $product3->setName("szempillaspirál");
        $product3->setPrice(120000);
        $product3->setCategory(ProductInterface::BEAUTY);

        $product4 = new Product();
        $product4->setName("Minecraft");
        $product4->setPrice(35000);
        $product4->setCategory(ProductInterface::GAMES);

        return [
            $product1,
            $product2,
            $product3,
            $product4
        ];
    }
}