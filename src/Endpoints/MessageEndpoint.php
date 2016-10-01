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
 * Message related REST Endpoint
 * Class MessageEndpoint
 * @package Gnello\OpenFireRestAPI\Endpoints
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#message-related-rest-endpoints
 */
class MessageEndpoint extends Dispatcher
{
    public static $endpoint = '/messages';

    /**
     * Send a broadcast/server message to all online users
     * @param $body
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#send-a-broadcast-message
     */
    public function sendBroadcastMessage($body)
    {
        $payload = new Payloads\MessagePayload(compact('body'));
        $endpoint = self::$endpoint . UserEndpoint::$endpoint;
        return self::sendRequest(Method::POST, $endpoint, $payload);
    }
}