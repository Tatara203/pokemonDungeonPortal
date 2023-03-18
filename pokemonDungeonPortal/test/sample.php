<?php
require_once '../../PHPstudy/composer/vendor/autoload.php'; // Guzzleをインストールした場合、autoload.phpを読み込んでください。

use GuzzleHttp\Client;

// GuzzleのClientオブジェクトを作成
$client = new Client();

// リクエストを送信し、レスポンスを取得
$response = $client->request('GET', 'https://wiki.grovyle.net/pokedun3/index.php',['veryfy' => false]);

// レスポンスボディを文字列として取得し、表示
echo $response->getBody()->getContents();
