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

namespace Gnello\OpenFireRestAPI\Debug;

/**
 * Class Request
 * @package Gnello\OpenFireRestAPI\Debug
 */
abstract class Request
{
    /**
     * @var array
     */
    private static $requestes = array();

    /**
     * @param $url
     * @param $headers
     * @param $method
     * @param $postData
     * @param $response
     * @param $server_output
     */
    public static function recordRequest($url, $headers, $method, $postData, $response, $server_output)
    {
        self::$requestes[] = compact('url', 'headers', 'method', 'postData', 'response', 'server_output');
    }

    /**
     * @return array
     */
    public static function getRequestes()
    {
        return self::$requestes;
    }
}