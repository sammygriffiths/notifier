<?php

namespace Griff\Services;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Cryptocurrency extends Command
{
  protected function configure()
  {
    $this->setName('services:cryptocurrencies');
    $this->setDescription('Check the prices of various cryptocurrencies and send a notification');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $output->writeln('Here');
  }
}