<?php

namespace HappyHourReminder\Adapter;

use DateTime;
use HappyHourReminder\Entity\Response;
use Mailgun\Mailgun;

/**
 * Class MailAdapter
 *
 * @package HappyHourReminder\Adapter
 */
class MailAdapter implements AdapterInterface
{
    /** @var Mailgun */
    protected $mailgun;

    /**
     * MailAdapter constructor.
     *
     * @param Mailgun $mailgun
     */
    public function __construct(Mailgun $mailgun)
    {
        $this->mailgun = $mailgun;
    }

    /**
     * @inheritDoc
     */
    public function remind(Response $response)
    {
        $dateTime = new DateTime();

        foreach (explode(',', getenv('MAIL_TO')) as $mail) {
            $this->mailgun->sendMessage(
                getenv('MAILGUN_DOMAIN'),
                [
                    'from'    => getenv('MAIL_FROM'),
                    'to'      => $mail,
                    'subject' => 'Zmiana na millenium - ' . $dateTime->format('Y-m-d'),
                    'text'    => $response->getContentText()
                ]
            );
        }
    }
}
