<?php
namespace bloody_hell\webCamApi;


interface IConnector
{
    /**
     * @param string $method
     * @param string $format
     * @param array $params
     *
     * @return mixed
     */
    public function call($method, $format, $params = []);
}