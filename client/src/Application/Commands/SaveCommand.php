<?php

namespace Drupal\client\Application\Commands;

class SaveCommand
{
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->name  = $name;
        $this->email = $email;
    }

    public function name()
    {
        return $this->name;
    }

    public function email()
    {
        return $this->email;
    }
}