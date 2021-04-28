<?php declare(strict_types=1);

namespace Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Service\ProductService;

class ProductController extends AbstractController {

    public function getProductsAction(ProductService $productService) {
        $products = $productService->getProducts();

        return $this->json($products);
    }

}