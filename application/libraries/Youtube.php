<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Youtube {

  private $api_key;

  public function __construct() {
    $this->api_key = 'AIzaSyD0WXNQu0D88GkAftgvzwSatjf0jK4ssHw';
  }

  public function search($query, $max_results = 10, $token=''){
    $url = 'https://www.googleapis.com/youtube/v3/search?part=snippet&q=' . urlencode($query) . '&maxResults=' . $max_results . '&key=' . $this->api_key . '&pageToken='.$token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
  }

}
