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
 * Class ChatRoomEndpoint
 * @package Gnello\OpenFireRestAPI\Endpoints
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#chat-room-related-rest-endpoints
 */
class ChatRoomEndpoint extends Dispatcher
{
    public static $endpoint = '/chatrooms';

    /**
     * Endpoints to get all chat rooms
     * @param string $servicename
     * @param string $type
     * @param null $search
     * @return array with Chatrooms
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-all-chat-rooms
     */
    public function retrieveAllChatRooms($servicename = 'conference', $type = 'public', $search = null)
    {
        $getData = compact('servicename', 'type', 'search');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '?' . $getData;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Endpoints to get information over specific chat room
     * @param $roomName
     * @param string $servicename
     * @return array with Chatrooms
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-a-chat-room
     */
    public function retrieveChatRoom($roomName, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '/' . $roomName . '?' . $getData;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Endpoints to get all participants with a role of specified room.
     * @param $roomName
     * @param string $servicename
     * @return array with Participants
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-chat-room-participants
     */
    public function retrieveChatRoomParticipants($roomName, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '/' . $roomName . '/participants?' . $getData;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Endpoints to get all occupants (all roles/affiliations) of a specified room.
     * @param $roomName
     * @param string $servicename
     * @return array with Occupants
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-chat-room-occupants
     */
    public function retrieveChatRoomOccupants($roomName, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '/' . $roomName . '/occupants?' . $getData;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Endpoints to create a new chat room.
     * @param Payloads\ChatRoomPayload $payload
     * @param string $servicename
     * @return array with HTTP status 201 (Created)
     */
    public function createChatRoom(Payloads\ChatRoomPayload $payload, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '?' . $getData;
        return self::sendRequest(Method::POST, $endpoint, $payload);
    }

    /**
     * Endpoints to delete a chat room.
     * @param $roomName
     * @param string $servicename
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-chat-room
     */
    public function deleteChatRoom($roomName, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '/' . $roomName . '?' . $getData;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * TODO: not working
     * Endpoints to update a chat room.
     * @param $roomName
     * @param Payloads\ChatRoomPayload $payload
     * @param string $servicename
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#update-a-chat-room
     */
    public function updateChatRoom($roomName, Payloads\ChatRoomPayload $payload, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '/' . $roomName . '?' . $getData;
        return self::sendRequest(Method::PUT, $endpoint, $payload);
    }

    /**
     * TODO: add check roles
     * Endpoint to add a new user with role to a room.
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @param string $servicename
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#add-user-with-role-to-chat-room
     */
    public function addUserWithRoleToChatRoom($roomName, $roles, $name, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/' . $name . '?' . $getData;
        return self::sendRequest(Method::POST, $endpoint);
    }

    /**
     * TODO: add check roles
     * Endpoint to add a new group with role to a room.
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @param string $servicename
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#add-group-with-role-to-chat-room
     */
    public function addGroupWithRoleToChatRoom($roomName, $roles, $name, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/group/' . $name . '?' . $getData;
        return self::sendRequest(Method::POST, $endpoint);
    }

    /**
     * Endpoint to remove a room user role.
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @param string $servicename
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-user-from-a-chat-room
     */
    public function deleteUserFromChatRoom($roomName, $roles, $name, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/' . $name . '?' . $getData;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * Endpoint to remove a room group role.
     * @param $roomName
     * @param $roles (owners, admins, members, outcasts)
     * @param $name
     * @param string $servicename
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-group-from-a-chat-room
     */
    public function deleteGroupFromChatRoom($roomName, $roles, $name, $servicename = 'conference')
    {
        $getData = compact('servicename');
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '/' . $roomName . '/' . $roles . '/group/' . $name . '?' . $getData;
        return self::sendRequest(Method::DELETE, $endpoint);
    }
}