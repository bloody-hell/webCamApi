<?php
namespace bloody_hell\webCamApi\connectors;


use bloody_hell\webCamApi\IConnector;


class SimpleConnector implements IConnector
{
    /** @var string */
    private $_url;

    /** @var string */
    private $_developer_id;

    /**
     * SimpleConnector constructor.
     *
     * @param string $developer_id
     * @param string $url
     */
    public function __construct($developer_id, $url = 'https://api.webcams.travel/rest')
    {
        $this->_developer_id = $developer_id;
        $this->_url          = $url;
    }


    public function call($method, $format, $params = [])
    {
        return file_get_contents(implode('?', [
            $this->_url,
            http_build_query($this->generateParams($method, $format, $params)),
        ]));
    }

    protected function generateParams($method, $format, $params)
    {
        $params['devid'] = $this->_developer_id;
        $params['method'] = $method;
        $params['format'] = $format;

        return $params;
    }
}