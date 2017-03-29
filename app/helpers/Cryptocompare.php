<?php

namespace Griff;

use \GuzzleHttp\Client as GuzzleClient;

class Cryptocompare
{
  const URL = 'https://min-api.cryptocompare.com/data/price';

  private static function getPrices($cryptocurrency, array $currencies = ['GBP']) {
    $client = new GuzzleClient;

    $currencies = implode(',', $currencies);

    $result = $client->request('GET', self::URL, [
      'query' => [
        'fsym'  => $cryptocurrency,
        'tsyms' => $currencies
      ]
    ])->getBody();

    return json_decode($result, true);
  }

  public static function getEtherPrice() {
    return self::getPrices('ETH')['GBP'];
  }

  public static function getBitcoinPrice() {
    return number_format(self::getPrices('BTC')['GBP'], 2);
  }
}