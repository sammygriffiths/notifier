<?php

namespace Griff;

final class Config
{
  private static $instance;
  private $config;

  private static function getInstance() {
    if (!isset(self::$instance)) {
      self::$instance = new Config();
    }
    return self::$instance;
  }

  private function __construct() {
    $this->config = json_decode(file_get_contents(__DIR__.'/../config/config.json'), true);
  }

  public static function get($key) {
    return self::getInstance()->config[$key];
  }
}
