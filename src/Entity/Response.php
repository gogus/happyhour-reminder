<?php

namespace HappyHourReminder\Entity;

/**
 * Class Response
 *
 * @package HappyHourReminder\Entity
 */
class Response
{
    /** @var bool */
    protected $available;

    /** @var string */
    protected $contentText;

    /**
     * Response constructor.
     *
     * @param bool $available
     * @param string $contentText
     */
    public function __construct($available, $contentText)
    {
        $this->available   = $available;
        $this->contentText = $contentText;
    }

    /**
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->available;
    }

    /**
     * @param boolean $available
     */
    public function setAvailable($available)
    {
        $this->available = $available;
    }

    /**
     * @return string
     */
    public function getContentText()
    {
        return $this->contentText;
    }

    /**
     * @param string $contentText
     */
    public function setContentText($contentText)
    {
        $this->contentText = $contentText;
    }
}
