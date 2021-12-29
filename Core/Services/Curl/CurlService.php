<?php
namespace KMS\Curl;

/**
* a class for loading and processing Json
*/
class CurlService
{

  /** @var string $url */

  /** @var array $params  */

  /** @var array $options  */


  /**
  * @param string $url
  * @param array|null $params
  * @param array|null $options
  */
  function __construct($url, $params = null, $options = [])
  {
    $this->url = $url;
    $this-> params = $params;
    $this->options = $options;
  }


  public function load()
  {
    if (!empty($this->params)) {
      $queryUrl = $this->url . "?" . http_buld_query($this->params);
    } else {
      $queryUrl = $this->url;
    }

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $queryUrl);

    curl_setopt_array(
      $curl,
      $this->options
    );

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }
}
