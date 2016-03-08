<?php
namespace bloody_hell\webCamApi\connectors;


use bloody_hell\webCamApi\IParser;


class JsonParser implements IParser
{
    public function parse($data)
    {
        return json_decode($data, true);
    }

    public function getName()
    {
        return 'json';
    }

}