<?php

namespace HappyHourReminder\Adapter;

use PHPMailer;

/**
 * Class MailAdapter
 *
 * @package HappyHourReminder\Adapter
 */
class MailAdapter implements AdapterInterface
{
    /** @var PHPMailer */
    protected $PHPMailer;

    /**
     * MailAdapter constructor.
     * 
     * @param PHPMailer $PHPMailer
     */
    public function __construct(PHPMailer $PHPMailer)
    {
        $this->PHPMailer = $PHPMailer;
    }

    /**
     * @inheritDoc
     */
    public function remind()
    {
        // TODO: Implement remind() method.
    }
}
