<?php

namespace HappyHourReminder\Client;

/**
 * Interface ClientInterface
 * 
 * @package HappyHourReminder\Client
 */
interface ClientInterface
{
    /**
     * @return bool
     */
    public function isAvailable();
}
