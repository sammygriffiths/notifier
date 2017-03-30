<?php

namespace Griff;

use \GuzzleHttp\Client as GuzzleClient;

class Pushover
{
  const API_URL = 'https://api.pushover.net/1/messages.json';
  const PRIORITIES = "-2,-1,0,1,2";
  private $client;
  private $params = [];
  public $sent_at = false;

  public function __construct($api_key, $user_key) {
    $this->client = new GuzzleClient();

    $this->params['token'] = $api_key;
    $this->params['user']  = $user_key;
  }

  public function setMessage($message) {
    $this->params['message'] = $message;
  }

  public function setTitle($title) {
    $this->params['title'] = $title;
  }

  public function setPriority($priority) {
    $valid_priorities = explode(',', self::PRIORITIES);
    if (!in_array($priority, $valid_priorities)) {
      throw new \Exception('Priority "'.$priority.'" is not valid');
    }
    $this->params['priority'] = $priority;
  }

  public function send() {
    $params = array_filter($this->params);

    $result = $this->client->request('POST', self::API_URL, [
      'form_params' => $params
    ])->getBody();
    $result = json_decode($result, true);

    $status = (bool) $result['status'];

    if (!$status){
      throw new \Exception('There was an error sending Pushover notification');
    }

    $this->sent_at = date('Y-m-d H:i:s');

    return $status;
  }

}