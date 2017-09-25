<?php

namespace Drupal\client\Application\Decorator;

use Drupal\client\Domain\DomainEventPublisher;
use Drupal\client\Domain\LogDomainEventSubscriber;

class LoggerDecorator
{
    private $commandHandler;
    private $logger;

    public function __construct($commandHandler, $logger)
    {
        $this->commandHandler = $commandHandler;
        $this->logger         = $logger;
    }

    public function execute($command)
    {
        DomainEventPublisher::instance()->subscribe(
            new LogDomainEventSubscriber($this->logger)
        );

        return $this->commandHandler->execute($command);
    }
}