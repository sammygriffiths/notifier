<?php

namespace Griff\Services;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Griff\Cryptocompare;

class Cryptocurrency extends Command
{
  protected function configure()
  {
    $this->setName('services:cryptocurrencies');
    $this->setDescription('Check the prices of various cryptocurrencies and send notifications');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    \Symfony\Component\VarDumper\VarDumper::dump(Cryptocompare::getPrice('ETH')); exit;
  }
}