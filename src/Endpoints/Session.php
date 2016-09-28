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

/**
 * Session related REST Endpoint
 * Class Session
 * @package Gnello\OpenFireRestAPI\Endpoints
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#session-related-rest-endpoints
 */
class Session extends Dispatcher
{
    public static $endpoint = '/sessions';

    /**
     * Get all user sessions
     * @return array with Sessions
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-all-user-session
     */
    public static function retrieveAllUserSession()
    {
        return self::sendRequest(Method::GET, self::$endpoint);
    }

    /**
     * Get sessions from a user
     * @param $username
     * @return array with Sessions
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-the-user-sessions
     */
    public static function retrieveUserSessions($username)
    {
        $endpoint = self::$endpoint . '/' . $username;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Close/kick sessions from a user
     * @param $username
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#close-all-user-sessions
     */
    public static function closeAllUserSessions($username)
    {
        $endpoint = self::$endpoint . '/' . $username;
        return self::sendRequest(Method::DELETE, $endpoint);
    }
}