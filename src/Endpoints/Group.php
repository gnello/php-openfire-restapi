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
 * Group related REST Endpoint
 * Class Group
 * @package Gnello\OpenFireRestAPI\Endpoints
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#group-related-rest-endpoints
 */
class Group extends Dispatcher
{
    public static $endpoint = '/groups';

    /**
     * Get all groups
     * @return array with Groups
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-all-groups
     */
    public static function retrieveAllGroups()
    {
        return self::sendRequest(Method::GET, self::$endpoint);
    }

    /**
     * Get information over specific group
     * @param string $groupName
     * @return array with Group
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-a-group
     */
    public static function retrieveGroup($groupName)
    {
        $endpoint = self::$endpoint . '/' . $groupName;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Create a new group
     * @param $name
     * @param $description
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#create-a-group
     */
    public static function createGroup($name, $description)
    {
        $payload = new Payloads\Group(compact('name', 'description'));
        return self::sendRequest(Method::POST, self::$endpoint, $payload);
    }

    /**
     * Delete a group
     * @param $groupName
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-group
     */
    public static function deleteGroup($groupName)
    {
        $endpoint = self::$endpoint . '/' . $groupName;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * Update/overwrite a group
     * @param $groupName
     * @param $name
     * @param $description
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#update-a-group
     */
    public static function updateGroup($groupName, $name, $description)
    {
        $payload = new Payloads\Group(compact('name', 'description'));
        $endpoint = self::$endpoint . '/' . $groupName;
        return self::sendRequest(Method::PUT, $endpoint, $payload);
    }
}