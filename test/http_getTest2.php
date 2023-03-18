<?php
 require  '../../PHPstudy/composer/vendor/autoload.php';

  $cli = new GuzzleHttp\Client([
    'base_uri' => 'http://wikinavi.net/'
]);

 $res = $cli->request('get', 'cho-dungeon/index.php');

 print $res->getBody();