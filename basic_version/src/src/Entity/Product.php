<?php declare(strict_types=1);

namespace Entity;

class Product implements ProductInterface {
    private string $name;
    private int $price;
    private int $category = ProductInterface::FASHION;
    private bool $isOnSale = false;

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setPrice(int $price): void {
        $this->price = $price;
    }

    public function getPrice(): int {
        return $this->price;
    }

    public function setCategory(int $category): void {
        $this->category = $category;
    }

    public function getCategory(): int {
        return $this->category;
    }
    
    public function setIsOnSale(bool $isOnSale): void {
        $this->isOnSale = $isOnSale;
    }

    public function getIsOnSale(): bool {
        return $this->isOnSale;
    }
}