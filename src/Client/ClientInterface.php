<?php

namespace HappyHourReminder\Client;

use HappyHourReminder\Entity\Response;

/**
 * Interface ClientInterface
 * 
 * @package HappyHourReminder\Client
 */
interface ClientInterface
{
    /**
     * @return Response
     */
    public function getResponse();
}
