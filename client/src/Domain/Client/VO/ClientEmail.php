<?php

namespace Drupal\client\Domain\Client\VO;

/**
 * ClientEmail Value Object Class
 */
class ClientEmail
{
    private $email;

    private function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Name constructor
     *
     * @return ClientEmail
     */
    public static function create(string $email): ClientEmail
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException();
        }

        return new self($email);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
}