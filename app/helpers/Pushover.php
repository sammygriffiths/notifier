<?php

namespace Griff;

use \GuzzleHttp\Client as GuzzleClient;

class Pushover
{
  const API_URL = 'https://api.pushover.net/1/messages.json';
  private $client;
  private $api_key;
  private $user_key;
  private $message;
  private $title;

  public function __construct($api_key, $user_key) {
    $this->client = new GuzzleClient();

    $this->api_key  = $api_key;
    $this->user_key = $user_key;
  }

  public function setMessage($message) {
    $this->message = $message;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function send() {
    $params = [
      'token' => $this->api_key,
      'user' => $this->user_key,
      'message' => $this->message,
      'title' => $this->title,
    ];
    $params = array_filter($params);

    $result = $this->client->request('POST', self::API_URL, [
      'form_params' => $params
    ])->getBody();
    $result = json_decode($result, true);

    return (bool) $result['status'];
  }

}