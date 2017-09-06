<?php

namespace Drupal\client\Infrastructure\Persistence\Database;

use Drupal\client\Domain\Client\Client;
use Drupal\client\Domain\Client\ClientRepository;
use Drupal\Core\Database\Connection;

class DatabaseClientRepository implements ClientRepository
{
    private $databaseApi;

    /**
     * Class constructor.
     */
    public function __construct(Connection $databaseApi)
    {
        $this->databaseApi = $databaseApi;
    }

    /**
     * {@inheritdoc}
     */
    public function save(Client $aClient) { }

    /**
     * {@inheritdoc}
     */
    public function findAll() { }
}