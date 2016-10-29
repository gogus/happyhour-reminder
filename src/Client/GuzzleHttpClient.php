<?php

namespace HappyHourReminder\Client;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class GuzzleHttpClient
 *
 * @package HappyHourReminder\Client
 */
class GuzzleHttpClient implements ClientInterface
{
    /** @var Client */
    protected $httpClient;

    /** @var Crawler */
    protected $crawler;

    /**
     * GuzzleHttpClient constructor.
     *
     * @param Client $httpClient
     * @param Crawler $crawler
     */
    public function __construct(Client $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }
    
    /**
     * @inheritDoc
     */
    public function isAvailable()
    {
        return true;
    }
}
