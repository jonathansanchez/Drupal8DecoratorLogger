<?php

namespace Drupal\client\Domain\Client;

use Drupal\client\Domain\Client\VO\ClientEmail;
use Drupal\client\Domain\Client\VO\ClientName;
use Drupal\client\Domain\DomainEventPublisher;

class Client
{
    private $name;
    private $email;
    private $createdAt;

    public function __construct(ClientName $aName, ClientEmail $anEmail)
    {
        $this->setName($aName);
        $this->setEmail($anEmail);
        $this->createdAt(new \DateTimeImmutable());
        $this->publishEvent();
    }

    protected function publishEvent()
    {
        DomainEventPublisher::instance()->publish(
            new ClientWasCreated($this->name(), $this->email())
        );
    }

    private function setName($aName)
    {
        $this->name = $aName;
    }

    public function name()
    {
        return $this->name;
    }

    private function setEmail($anEmail)
    {
        $this->email = $anEmail;
    }

    public function email()
    {
        return $this->email;
    }

    private function createdAt(\DateTimeImmutable $aDate)
    {
        $this->createdAt = $aDate;
    }
}