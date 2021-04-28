<?php declare(strict_types=1);

namespace Entity;

interface UserInterface {
    public function setEmail(string $email): void;

    public function getEmail(): string;

    public function setUserName(string $userName): void;

    public function getUserName(): string;

    public function setPassword(string $password): void;

    public function getPassword(): string;

    public static function verifyPassword(string $password, string $hash): bool;
}