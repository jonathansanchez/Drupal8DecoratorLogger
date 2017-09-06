<?php

namespace Drupal\client\Domain\Client;

/**
 * Interface Client
 * @package Domain\Client
 *
 * This file must be implemented by infrastructure
 * to persist/log a Client.
 */
interface ClientRepository
{
    /**
     * Save a Client
     *
     * @param Client $aClient
     *
     * @return bool true|false
     */
    public function save(Client $aClient);

    /**
     * Find all clients
     *
     * @param none
     *
     * @return array|null
     */
    public function findAll();
}