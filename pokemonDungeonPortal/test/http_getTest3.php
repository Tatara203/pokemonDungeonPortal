<?php
 require  '../../PHPstudy/composer/vendor/autoload.php';

  $cli = new GuzzleHttp\Client([
    'base_uri' => 'https://wiki.grovyle.net/'
]);

 $res = $cli->request('get', './pokedun2/index.php');

 print $res->getBody();