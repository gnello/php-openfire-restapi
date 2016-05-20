<?php
/**
 * OpenFireRestAPI is based entirely on official documentation of the REST API
 * Plugin and you can extend it by following the directives of the documentation
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/nelcoa/PHPOpenFireRestAPI/contributors
 *
 * @author Luca Agnello <lcagnello@gmail.com>
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */

namespace Nelcoa\OpenFireRestAPI;

use \Nelcoa\OpenFireRestAPI\Dispatcher\Method;
use \Nelcoa\OpenFireRestAPI\Dispatcher\Dispatcher;

/**
 * Message related REST Endpoints
 * Class Messages
 * @package OpenFireRestAPI
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#message-related-rest-endpoints
 */
class Messages extends Dispatcher
{
    public static $endpoint = '/messages';

    /**
     * Send a broadcast/server message to all online users
     * @param $body
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#send-a-broadcast-message
     */
    public static function sendBroadcastMessage($body)
    {
        $endpoint = self::$endpoint . Users::$endpoint;
        return self::sendRequest(Method::POST, $endpoint, compact('body'));
    }
}