<?php
namespace bloody_hell\webCamApi\connectors;


use bloody_hell\webCamApi\IParser;
use SimpleXMLElement;


class XmlParser implements IParser
{
    public function parse($data)
    {
        return new SimpleXMLElement($data); // TODO: there should be xml parsing to array.
    }

    public function getName()
    {
        return 'xml';
    }

}