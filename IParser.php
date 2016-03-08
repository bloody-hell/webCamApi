<?php
namespace bloody_hell\webCamApi;


interface IParser
{
    /**
     * @param $data
     *
     * @return array
     */
    public function parse($data);

    /**
     * @return string
     */
    public function getName();
}