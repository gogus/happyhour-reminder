<?php

namespace HappyHourReminder\Client;

use GuzzleHttp\Client;
use HappyHourReminder\Entity\Response;
use Symfony\Component\Cache\Adapter\AbstractAdapter;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class GuzzleHttpClient
 *
 * @package HappyHourReminder\Client
 */
class GuzzleHttpClient implements ClientInterface
{
    const CHECK_URL = 'https://www.bankmillennium.pl/klienci-indywidualni/produkty-oszczednosciowe/lokaty/happy-hours';
    const LAST_CONTENT_CACHE_KEY = 'happyhour.last.content';

    /** @var Client */
    protected $httpClient;

    /** @var Crawler */
    protected $crawler;

    /** @var AbstractAdapter */
    protected $cache;

    /**
     * GuzzleHttpClient constructor.
     *
     * @param Client          $httpClient
     * @param Crawler         $crawler
     * @param AbstractAdapter $cache
     */
    public function __construct(Client $httpClient, Crawler $crawler, AbstractAdapter $cache)
    {
        $this->httpClient = $httpClient;
        $this->crawler    = $crawler;
        $this->cache      = $cache;
    }
    
    /**
     * @inheritDoc
     */
    public function getResponse()
    {
        $request = $this->httpClient->get(self::CHECK_URL);

        $this->crawler->addHtmlContent($request->getBody());

        $lastContent    = $this->cache->getItem(self::LAST_CONTENT_CACHE_KEY);
        $currentContent = $this->crawler->filter('strong')->getNode(0)->textContent;

        if (!$lastContent->isHit()) {
            $lastContent->set($this->crawler->filter('strong')->getNode(0)->textContent);
            $this->cache->save($lastContent);
        } elseif ($lastContent->get() !== $currentContent) {
            $this->cache->deleteItem(self::LAST_CONTENT_CACHE_KEY);

            return new Response(true, $currentContent);
        }

        return new Response(false, null);
    }
}
