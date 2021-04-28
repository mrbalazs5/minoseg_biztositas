<?php declare(strict_types=1);

namespace Entity;

interface ProductInterface {
    public const FASHION = 0;
    public const SPORT = 1;
    public const BEAUTY = 2;
    public const GAMES = 3;
    public const OTHER = 4;
    
    public function setName(string $name): void;

    public function getName(): string;

    public function setPrice(int $price): void;

    public function getPrice(): int;

    public function setCategory(int $category): void;

    public function getCategory(): int;

    public function setIsOnSale(bool $isOnSale): void;

    public function getIsOnSale(): bool;
}