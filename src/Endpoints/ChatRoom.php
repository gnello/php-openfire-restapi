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
 * Chat room related REST Endpoint
 * Class ChatRoom
 * @package Gnello\OpenFireRestAPI\Endpoints
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#chat-room-related-rest-endpoints
 */
class ChatRoom extends Dispatcher
{
    public static $endpoint = '/chatrooms';

    /**
     * Endpoints to get all chat rooms
     * @return array with Chatrooms
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-all-chat-rooms
     */
    public static function retrieveAllChatRooms()
    {
        return self::sendRequest(Method::GET, self::$endpoint);
    }

    /**
     * Endpoints to get information over specific chat room
     * @param $roomName
     * @return array with Chatrooms
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-a-chat-room
     */
    public static function retrieveChatRoom($roomName)
    {
        $endpoint = self::$endpoint . '/' . $roomName;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Endpoints to get all participants with a role of specified room.
     * @param $roomName
     * @return array with Participants
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-chat-room-participants
     */
    public static function retrieveChatRoomParticipants($roomName)
    {
        $endpoint = self::$endpoint . '/' . $roomName . '/participants';
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Endpoints to get all occupants (all roles/affiliations) of a specified room.
     * @param $roomName
     * @return array with Occupants
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-chat-room-occupants
     */
    public static function retrieveChatRoomOccupants($roomName)
    {
        $endpoint = self::$endpoint . '/' . $roomName . '/occupants';
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Endpoints to create a new chat room.
     * @param Payloads\ChatRoom $payload
     * @return array with HTTP status 201 (Created)
     */
    public static function createChatRoom(Payloads\ChatRoom $payload)
    {
        return self::sendRequest(Method::POST, self::$endpoint, $payload);
    }

    /**
     * Endpoints to delete a chat room.
     * @param $roomName
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-chat-room
     */
    public static function deleteChatRoom($roomName)
    {
        $endpoint = self::$endpoint . '/' . $roomName;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * TODO: not working....
     * Endpoints to update a chat room.
     * @param $roomName
     * @param Payloads\ChatRoom $payload
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#update-a-chat-room
     */
    public static function updateChatRoom($roomName, Payloads\ChatRoom $payload)
    {
        $endpoint = self::$endpoint . '/' . $roomName;
        return self::sendRequest(Method::PUT, $endpoint, $payload);
    }

    /**
     * TODO: add check roles
     * Endpoint to add a new user with role to a room.
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#add-user-with-role-to-chat-room
     */
    public static function addUserWithRoleToChatRoom($roomName, $roles, $name)
    {
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/' . $name;
        return self::sendRequest(Method::POST, $endpoint);
    }

    /**
     * TODO: add check roles
     * Endpoint to add a new group with role to a room.
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#add-group-with-role-to-chat-room
     */
    public static function addGroupWithRoleToChatRoom($roomName, $roles, $name)
    {
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/group/' . $name;
        return self::sendRequest(Method::POST, $endpoint);
    }

    /**
     * Endpoint to remove a room user role.
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-user-from-a-chat-room
     */
    public static function deleteUserFromChatRoom($roomName, $roles, $name)
    {
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/' . $name;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * Endpoint to remove a room group role.
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-group-from-a-chat-room
     */
    public static function deleteGroupFromChatRoom($roomName, $roles, $name)
    {
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/group/' . $name;
        return self::sendRequest(Method::DELETE, $endpoint);
    }
}