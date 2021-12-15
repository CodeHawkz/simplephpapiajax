<?php
  /*
   * This PHP has 2 functions.
   * If you call "api.php?name=Sumeet", it will respond with "Hello Sumeet"
   * If you call "api.php" without any query string parameters, it will fire a request to 
   *  "publicapis.org" and return the response as JSON
   */

  $query = [];
  $querystring = $_SERVER['QUERY_STRING'] ?? '';
  
  parse_str($querystring, $query);
  
  if (array_key_exists('name', $query)) {
    $name = $query['name'];
    echo "{ \"data\": \"Hello $name\" }";
    return;
  }

  const url = "https://api.publicapis.org/entries";
  $fp = fopen(url, 'r');

  $publicapis = stream_get_contents($fp);

  header('Content-Type: application/json');
  echo $publicapis
?>
