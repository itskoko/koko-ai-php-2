<?php

namespace Koko;
use GuzzleHttp\Client;

class Tracker {
  const ENDPOINT = 'https://api.koko.ai';

  public function __construct($options) {
    $this->client = new \GuzzleHttp\Client();
    $this->headers = [
      'Authorization' => $options['auth'],
      'Content-Type' => 'application/json'
    ];
  }

  protected function request($pathname, $options) {
    $url = self::ENDPOINT . $pathname;

    $response = $this->client->request('POST', $url, [
      'headers' => $this->headers,
      'json' => $options,
      'http_errors' => false
    ]);

    $json = $response->getBody()->getContents();
    $data = json_decode($json, true);

    if (array_key_exists('error', $data)) {
      throw new \Exception(join('\n', $data['error']));
    }

    return $data;
  }

  public function trackContent($options) {
    return self::request('/track/content', $options);
  }

  public function trackFlag($options) {
    return self::request('/track/flag', $options);
  }

  public function trackModeration($options) {
    return self::request('/track/moderation', $options);
  }
}
