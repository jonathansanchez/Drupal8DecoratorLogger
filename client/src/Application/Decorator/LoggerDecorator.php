<?php

namespace Drupal\client\Application\Decorator;

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
        $this->logger->notice('Somenthing was saved.');

        return $this->commandHandler->execute($command);
    }
}