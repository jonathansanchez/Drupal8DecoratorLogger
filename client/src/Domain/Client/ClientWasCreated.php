<?php

namespace Drupal\client\Domain\Client;

use Drupal\client\Domain\Client\VO\ClientEmail;
use Drupal\client\Domain\Client\VO\ClientName;
use Drupal\client\Domain\DomainEvent;

class ClientWasCreated implements DomainEvent
{
    private $name;
    private $email;
    private $occurredOn;

    public function __construct(ClientName $aName, ClientEmail $anEmail)
    {
        $this->name = $aName;
        $this->email = $anEmail;
        $this->occurredOn = new \DateTimeImmutable();
    }

    public function name()
    {
        return $this->name;
    }

    public function email()
    {
        return $this->email;
    }

    public function occurredOn()
    {
        return $this->occurredOn;
    }

}