<?php
require(__DIR__ . '/vendor/autoload.php');

$api = new \bloody_hell\webCamApi\WebCamApi(
    new \bloody_hell\webCamApi\connectors\SimpleConnector('12b46ed7e6931b68772374abfe658a56'),
    new \bloody_hell\webCamApi\parsers\JsonParser()
);

var_dump($api->usersGetProfile(175930));
