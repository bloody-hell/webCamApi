<?php
namespace bloody_hell\webCamApi;


use bloody_hell\webCamApi\exceptions\EmptyResponseException;
use bloody_hell\webCamApi\exceptions\Exception;
use bloody_hell\webCamApi\models\User;


class WebCamApi
{
    /** @var IConnector */
    private $_connector;

    /** @var IParser */
    private $_parser;

    /**
     * WebCamApi constructor.
     *
     * @param IConnector $connector
     * @param IParser    $parser
     */
    public function __construct(IConnector $connector, IParser $parser)
    {
        $this->_connector = $connector;
        $this->_parser    = $parser;
    }

    /**
     * @param $user_id
     *
     * @return User
     */
    public function usersGetProfile($user_id)
    {
        $data = $this->get('wct.users.get_profile', ['userid' => $user_id]);

        return isset($data['user']) ? new User($data['user']) : null;
    }

    /**
     * @param     $user_id
     * @param int $per_page
     * @param int $page
     *
     * @return array
     */
    public function usersListFavoriteWebcams($user_id, $per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.users.list_favorite_webcams', [
            'userid'   => $user_id,
            'per_page' => $per_page,
            'page'     => $page,
        ]);
    }

    /**
     * @param $webcamid
     *
     * @return array
     */
    public function webcamsGetDetails($webcamid)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.get_details', ['webcamid' => $webcamid,]);
    }

    /**
     * @param array $webcamids
     *
     * @return array
     */
    public function webcamsGetDetailsMultiple(array $webcamids)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.get_details_multiple', ['webcamids' => $webcamids,]);
    }

    /**
     * @param     $webcamid
     * @param int $per_page
     * @param int $page
     *
     * @return array
     */
    public function webcamsLitsComments($webcamid, $per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_comments', [
            'webcamid' => $webcamid,
            'per_page' => $per_page,
            'page'     => $page,
        ]);
    }

    /**
     * @param        $lat
     * @param        $lng
     * @param float  $radius
     * @param string $unit
     * @param int    $per_page
     * @param int    $page
     *
     * @return array
     */
    public function webcamsLitsNearby($lat, $lng, $radius = 0.2, $unit = 'deg', $per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_nearby', [
            'lat'      => $lat,
            'lng'      => $lng,
            'radius'   => $radius,
            'unit'     => $unit,
            'per_page' => $per_page,
            'page'     => $page,
        ]);
    }

    /**
     * @param     $tag
     * @param int $per_page
     * @param int $page
     *
     * @return array
     */
    public function webcamsListByTag($tag, $per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_by_tag', [
            'tag'      => $tag,
            'per_page' => $per_page,
            'page'     => $page,
        ]);
    }

    /**
     * @param     $userid
     * @param int $per_page
     * @param int $page
     *
     * @return array
     */
    public function webcamsListByUser($userid, $per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_by_user', [
            'userid'   => $userid,
            'per_page' => $per_page,
            'page'     => $page,
        ]);
    }

    public function webcamsListByContinent($continent, $per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_by_continent', [
            'continent' => $continent,
            'per_page'  => $per_page,
            'page'      => $page,
        ]);
    }

    /**
     * @param     $country
     * @param int $per_page
     * @param int $page
     *
     * @return array
     */
    public function webcamsListByCountry($country, $per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_by_country', [
            'country'  => $country,
            'per_page' => $per_page,
            'page'     => $page,
        ]);
    }

    /**
     * @param int $per_page
     * @param int $page
     *
     * @return array
     */
    public function webcamsListNew($per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_new', [
            'per_page' => $per_page,
            'page'     => $page,
        ]);
    }

    /**
     * @param int $per_page
     * @param int $page
     *
     * @return array
     */
    public function webcamsListRecent($per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_recent', [
            'per_page' => $per_page,
            'page'     => $page,
        ]);
    }

    /**
     * @param int $per_page
     * @param int $page
     *
     * @return array
     */
    public function webcamsListPopular($per_page = 10, $page = 1)
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_popular', [
            'per_page' => $per_page,
            'page'     => $page,
        ]);
    }

    /**
     * @param int    $limit
     * @param string $type
     *
     * @return array
     */
    public function webcamsListRandom($limit = 1, $type = 'all')
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_random', [
            'limit'  => $limit,
            'type'   => $type,
        ]);
    }

    /**
     * @param int    $limit
     * @param string $type
     *
     * @return array
     */
    public function webcamsListTimelapse($limit = 1, $type = 'all')
    {
        // TODO: model object should return instead of array
        return $this->get('wct.webcams.list_timelapse', [
            'limit'  => $limit,
            'type'   => $type,
        ]);
    }

    /**
     * @param        $query
     * @param int    $limit
     * @param string $type
     *
     * @return array
     */
    public function searchWebcams($query, $limit = 1, $type = 'all')
    {
        // TODO: model object should return instead of array
        return $this->get('wct.search.webcams', [
            'query'  => $query,
            'limit'  => $limit,
            'type'   => $type,
        ]);
    }

    /**
     * @param        $query
     * @param int    $limit
     * @param string $type
     *
     * @return array
     */
    public function searchUsers($query, $limit = 1, $type = 'all')
    {
        // TODO: model object should return instead of array
        return $this->get('wct.search.users', [
            'query'  => $query,
            'limit'  => $limit,
            'type'   => $type,
        ]);
    }

    /**
     * @param        $query
     * @param int    $limit
     * @param string $type
     *
     * @return array
     */
    public function searchTags($query, $limit = 1, $type = 'all')
    {
        // TODO: model object should return instead of array
        return $this->get('wct.search.tags', [
            'query'  => $query,
            'limit'  => $limit,
            'type'   => $type,
        ]);
    }

    /**
     * @param        $sw_lat
     * @param        $sw_lng
     * @param        $ne_lat
     * @param        $ne_lng
     * @param        $zoom
     * @param string $mapapi
     *
     * @return array
     */
    public function mapBbox($sw_lat, $sw_lng, $ne_lat, $ne_lng, $zoom, $mapapi = 'google')
    {
        // TODO: model object should return instead of array
        return $this->get('wct.map.bbox', [
            'sw_lat' => $sw_lat,
            'sw_lng' => $sw_lng,
            'ne_lat' => $ne_lat,
            'ne_lng' => $ne_lng,
            'zoom'   => $zoom,
            'mapapi' => $mapapi,
        ]);
    }

    /**
     * @return array
     */
    public function countriesList()
    {
        // TODO: model object should return instead of array
        return $this->get('wct.countries.list', []);
    }

    /**
     * @param string $method
     * @param array $data
     *
     * @return array
     *
     * @throws Exception
     */
    private function get($method, array $data)
    {
        $data = $this->_parser->parse($this->_connector->call($method, $this->_parser->getName(), $data));

        if(!isset($data['status'])) {
            throw new EmptyResponseException();
        }

        if($data['status'] === 'fail') {

            // Specific error codes may be processed with special exception for better error handling

            throw new Exception(
                isset($data['error']['description']) ? $data['error']['description'] : null,
                isset($data['error']['code']) ? $data['error']['code'] : null
            );
        }

        if($data['status'] !== 'ok') {
            throw new Exception('Unknown response status');
        }

        return $data;
    }
}