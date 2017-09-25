<?php

namespace Drupal\client\Domain;

class LogDomainEventSubscriber implements DomainEventSubscriber
{
    private $logger;

    public function __construct($aLogger)
    {
        $this->logger = $aLogger;
    }

    public function handle($aDomainEvent)
    {
        $this->logger->notice(
            serialize($aDomainEvent)
        );
    }

    public function isSubscribedTo($aDomainEvent)
    {
        return true;
    }
}