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

namespace Nelcoa\OpenFireRestAPI\Endpoints;

use \Nelcoa\OpenFireRestAPI\Dispatcher\Method;
use \Nelcoa\OpenFireRestAPI\Dispatcher\Dispatcher;

/**
 * TODO: Control and implement better
 * Chat room related REST Endpoints
 * Class ChatRooms
 * @package OpenFireRestAPI
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#chat-room-related-rest-endpoints
 */
class ChatRooms extends Dispatcher
{
    public static $endpoint = '/chatrooms';

    /**
     * @return array|false
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-all-chat-rooms
     */
    public static function retrieveAllChatRooms()
    {
        return self::sendRequest(Method::GET, self::$endpoint);
    }

    /**
     * @param $roomName
     * @return array|false
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-a-chat-room
     */
    public static function retrieveChatRoom($roomName)
    {
        $endpoint = self::$endpoint . '/' . $roomName;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * @param $roomName
     * @return array|false
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-chat-room-participants
     */
    public static function retrieveChatRoomParticipants($roomName)
    {
        $endpoint = self::$endpoint . '/' . $roomName . '/participants';
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * @param $roomName
     * @param $naturalName
     * @param $description
     * @param $subject
     * @param int $maxUsers
     * @param bool $publicRoom
     * @return array|false
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#create-a-chat-room
     */
    public static function createChatRoom($roomName, $naturalName, $description, $subject = '', $maxUsers = 0, $publicRoom = true)
    {
        return self::sendRequest(Method::POST, self::$endpoint, compact('roomName', 'naturalName', 'description', 'subject', 'maxUsers', 'publicRoom'));
    }

    /**
     * @param $roomName
     * @return array|false
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-chat-room
     */
    public static function deleteChatRoom($roomName)
    {
        $endpoint = self::$endpoint . '/' . $roomName;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * @param $originalRoomName
     * @param $roomName
     * @param $naturalName
     * @param $description
     * @param $subject
     * @param int $maxUsers
     * @param bool $publicRoom
     * @return array|false
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#update-a-chat-room
     */
    public static function updateChatRoom($originalRoomName, $roomName, $naturalName, $description, $subject = '', $maxUsers = 0, $publicRoom = true)
    {
        $endpoint = self::$endpoint . '/' . $originalRoomName;
        return self::sendRequest(Method::PUT, $endpoint, compact('roomName', 'naturalName', 'description', 'subject', 'maxUsers', 'publicRoom'));
    }

    /**
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @return array|false
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#add-user-with-role-to-chat-room
     */
    public static function addUserWithRoleToChatRoom($roomName, $roles, $name)
    {
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/' . $name;
        return self::sendRequest(Method::PUT, $endpoint);
    }

    /**
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @return array|false
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-user-from-a-chat-room
     */
    public static function deleteUserFromChatRoom($roomName, $roles, $name)
    {
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/' . $name;
        return self::sendRequest(Method::DELETE, $endpoint);
    }
}