<?php

namespace Griff\Services;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Griff\Cryptocompare;
use Griff\Pushover;
use Griff\Config;

class Cryptocurrency extends Command
{
  protected function configure()
  {
    $this->setName('services:cryptocurrencies');
    $this->setDescription('Check the prices of various cryptocurrencies and send notifications');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $pushover = new Pushover(Config::get('pushover_api_key'), Config::get('pushover_user_key'));

    $pushover->setTitle('Price of Ether');
    $pushover->setMessage(Cryptocompare::getPrice('ETH'));

    if ($pushover->send()) {
      $output->writeln('Notification sent at '.$pushover->sent_at);
    }

  }
}