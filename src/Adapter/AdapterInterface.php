<?php

namespace HappyHourReminder\Adapter;

use HappyHourReminder\Entity\Response;

/**
 * Interface AdapterInterface
 *
 * @package HappyHourReminder\Adapter
 */
interface AdapterInterface
{
    /**
     * Reminds about activity.
     *
     * @param Response $response
     */
    public function remind(Response $response);
}
