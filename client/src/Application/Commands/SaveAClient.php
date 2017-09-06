<?php

namespace Drupal\client\Application\Commands;

use Drupal\client\Domain\Client\Client;
use Drupal\client\Domain\Client\VO\ClientEmail;
use Drupal\client\Domain\Client\VO\ClientName;

class SaveAClient
{
    private $clientRepository;

    public function __construct($clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function execute(SaveCommand $command)
    {
        $client = new Client(
            ClientName::create($command->name()),
            ClientEmail::create($command->email())
        );

        $this->clientRepository->save($client);
    }
}