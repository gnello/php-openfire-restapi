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

namespace Gnello\OpenFireRestAPI\Endpoints;

use \Gnello\OpenFireRestAPI\Dispatcher\Method;
use \Gnello\OpenFireRestAPI\Dispatcher\Dispatcher;
use \Gnello\OpenFireRestAPI\Payloads;

/**
 * System related REST Endpoint
 * Class System
 * @package Gnello\OpenFireRestAPI\Endpoints
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#system-related-rest-endpoints
 */
class System extends Dispatcher
{
    public static $endpoint = '/system';

    /**
     * Get all system properties
     * @return array with System properties
     * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-all-system-properties
     */
    public static function retrieveAllSystemProperties()
    {
        $endpoint = self::$endpoint . '/properties';
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Get information over specific system property
     * @param $propertyName
     * @return array with System property
     * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-system-property
     */
    public static function retrieveSystemProperty($propertyName)
    {
        $endpoint = self::$endpoint . '/properties/' . $propertyName;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Create a system property
     * @param $propertyName
     * @param $propertyValue
     * @return array with HTTP status 201 (Created)
     * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#create-a-system-property
     */
    public static function createSystemProperty($propertyName, $propertyValue)
    {
        $payload = new Payloads\SystemProperty(compact('propertyName', 'propertyValue'));
        $endpoint = self::$endpoint . '/properties';
        return self::sendRequest(Method::POST, $endpoint, $payload);
    }

    /**
     * Delete a system property
     * @param $propertyName
     * @return array with HTTP status 200 (OK)
     * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-system-property
     */
    public static function deleteSystemProperty($propertyName)
    {
        $endpoint = self::$endpoint . '/properties/' . $propertyName;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * Update a system property
     * @param $propertyName
     * @return array with HTTP status 200 (OK)
     * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#update-a-system-property
     */
    public static function updateSystemProperty($propertyName)
    {
        $endpoint = self::$endpoint . '/properties/' . $propertyName;
        return self::sendRequest(Method::PUT, $endpoint);
    }

    /**
     * Get count of concurrent sessions
     * @return array with Sessions count
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-concurrent-sessions
     */
    public static function retrieveConcurrentSessions()
    {
        $endpoint = self::$endpoint . '/statistics' . Session::$endpoint;
        return self::sendRequest(Method::GET, $endpoint);
    }
}