<?php
namespace bloody_hell\webCamApi\parsers;


use bloody_hell\webCamApi\IParser;


class PhpParser implements IParser
{
    public function parse($data)
    {
        return unserialize($data);
    }

    public function getName()
    {
        return 'php';
    }

}