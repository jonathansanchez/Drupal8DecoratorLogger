<?php

namespace Drupal\client\Domain\Client\VO;

/**
 * ClientName Value Object Class
 */
class ClientName
{
    private $name;

    private function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Name constructor
     *
     * @return ClientName
     */
    public static function create(string $name): ClientName
    {
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            throw new \InvalidArgumentException();
        }

        return new self($name);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}