<?php
    require '../../PHPstudy/composer/vendor/autoload.php';

    $cli = new GuzzleHttp\Client([
        'base_uri' => 'https://wikiwiki.jp/'
    ]);

    $res = $cli->request('get','magunagate/',['verify' => false]);

    print $res->getbody();                                                              