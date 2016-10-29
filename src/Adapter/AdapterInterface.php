<?php

namespace HappyHourReminder\Adapter;

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
     * @return void
     */
    public function remind();
}
