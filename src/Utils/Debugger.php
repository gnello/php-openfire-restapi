<?php
/**
 * OpenFireRestAPI is based entirely on official documentation of the REST API
 * Plugin and you can extend it by following the directives of the documentation
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/gnello/PHPOpenFireRestAPI/contributors
 *
 * @author Luca Agnello <luca@gnello.com>
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */

namespace Gnello\OpenFireRestAPI\Utils;

use Gnello\OpenFireRestAPI\Wrappers\AbstractRegistryWrapper;

/**
 * Class Debugger
 * @package Gnello\OpenFireRestAPI\Utils
 */
class Debugger extends AbstractRegistryWrapper
{
    const REQUESTS  = 0;
    const CURL_INFO = 1;

    /**
     * @var Debugger
     */
    private static $instance;

    /**
     * Settings constructor.
     */
    private function __construct() {}

    /**
     * @return Debugger
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Debugger();
        }

        return self::$instance;
    }

    /**
     * @param $url
     * @param $headers
     * @param $method
     * @param $postData
     * @param $response
     * @param $server_output
     */
    public function recordRequest($url, $headers, $method, $postData, $response, $server_output)
    {
        $this->set(array(self::REQUESTS), compact('url', 'headers', 'method', 'postData', 'response', 'server_output'));
    }

    /**
     * @return array
     */
    public function getRequests()
    {
        return $this->get(self::REQUESTS);
    }

    /**
     * @param $curlInfo
     */
    public function recordCurlInfo($curlInfo)
    {
        $this->set(self::CURL_INFO, $curlInfo);
    }

    /**
     * @return array
     */
    public function getCurlInfo()
    {
        return $this->get(self::CURL_INFO);
    }
}
