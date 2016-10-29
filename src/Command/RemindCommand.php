<?php

namespace HappyHourReminder\Command;

use HappyHourReminder\Adapter\AdapterInterface;
use HappyHourReminder\Client\ClientInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class RemindCommand
 *
 * @package HappyHourReminder\Command
 */
class RemindCommand extends Command
{
    /** @var AdapterInterface */
    protected $adapter;
    
    /** @var ClientInterface */
    protected $client;

    /**
     * CheckCommand constructor.
     *
     * @param AdapterInterface $adapter
     * @param ClientInterface $client
     */
    public function __construct(AdapterInterface $adapter, ClientInterface $client)
    {
        parent::__construct();
        
        $this->adapter = $adapter;
        $this->client = $client;
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('happyhour:remind');
        $this->setDescription('Checks if happy hour is available and reminds about it.');
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Checking for happyhour...');
        
        if ($this->client->isAvailable()) {
            $output->writeln('Happyhour available.');
            $this->adapter->remind();
        }
    }
}
