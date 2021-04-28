<?php declare(strict_types=1);

namespace Service;

class ValidatorService {

    /**
     * @throws Exception if invalid
     */
    public function validateEmail(string $email): void {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Invalid email address.");
        }
    }

    /**
     * @throws Exception if invalid
     */
    public function validatePassword(string $password): void {

        if(empty($password)) {
            throw new \Exception("Password can not be empty.");
        }

        if(strlen($password) < 6) {
            throw new \Exception("Password length must be at least 6 characters long.");
        }

    }

    /**
     * @throws Exception if invalid
     */
    public function validateIntInterval(int $number, int $min, int $max): void {
        if(!(($number >= $min) && ($number <= $max))) {
            throw new \Exception("The value must be greater than $min and lower than $max.");
        }
    }

    /**
     * @throws Exception if invalid
     */
    public function validateStringLengthInterval(string $text, int $min, int $max): void {
        try {
            $length = strlen($text);

            $this->validateIntInterval($length, $min, $max);
        } catch(\Exception $e) {
            throw new \Exception("The length of the value must be greater than $min and lower than $max.");
        }
    }

    /**
     * @throws Exception if invalid
     */
    public function validateArrayContainsValue(mixed $value, array $array): void {
        if(!in_array($value, $array)) {
            throw new \Exception("Array does not contain the given value.");
        }
    }

}