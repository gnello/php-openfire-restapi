<?php

/**
 * OpenFireRestAPI is based entirely on the official documentation of the REST API
 * Plugin and you can extend it by following the directives of the documentation
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/gnello/PHPOpenFireRestAPI/contributors
 *
 * Ask, and it shall be given you; seek, and you shall find.
 *
 * @author Luca Agnello <luca@gnello.com>
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */

namespace Gnello\OpenFireRestAPI\Models;

use \Psr\Http\Message\ResponseInterface;

/**
 * Class ChatRoomModel
 *
 * @package Gnello\OpenFireRestAPI\Models
 */
class ChatRoomModel extends ModelFoundation
{
    /**
     * Roles list.
     */
    const ROLE_OWNER = 'owners';
    const ROLE_ADMIN = 'admins';
    const ROLE_MEMBER = 'members';
    const ROLE_OUTCAST = 'outcasts';

    /**
     * @var string
     */
    public static $endpoint = 'chatrooms';

    /**
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function retrieveAllChatRooms(array $requestOptions = [])
    {
        return $this->client->get(self::$endpoint, $requestOptions);
    }

    /**
     * @param       $roomName
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function retrieveChatRoom($roomName, array $requestOptions = [])
    {
        return $this->client->get(self::$endpoint . '/' . $roomName, $requestOptions);
    }

    /**
     * @param       $roomName
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function retrieveChatRoomParticipants($roomName, array $requestOptions = [])
    {
        return $this->client->get(self::$endpoint . '/' . $roomName . '/participants', $requestOptions);
    }

    /**
     * @param       $roomName
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function retrieveChatRoomOccupants($roomName, array $requestOptions = [])
    {
        return $this->client->get(self::$endpoint . '/' . $roomName . '/occupants', $requestOptions);
    }

    /**
     * @param       $roomName
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function retrieveChatRoomMessageHistory($roomName, array $requestOptions = [])
    {
        return $this->client->get(self::$endpoint . '/' . $roomName . '/chathistory', $requestOptions);
    }

    /**
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function createChatRoom(array $requestOptions)
    {
        return $this->client->post(self::$endpoint, $requestOptions);
    }

    /**
     * @param       $roomName
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function deleteChatRoom($roomName, array $requestOptions = [])
    {
        return $this->client->delete(self::$endpoint . '/' . $roomName, $requestOptions);
    }

    /**
     * @param       $roomName
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function updateChatRoom($roomName, array $requestOptions)
    {
        return $this->client->put(self::$endpoint . '/' . $roomName, $requestOptions);
    }

    /**
     * @param       $roomName
     * @param       $username
     * @param       $role
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function addUserWithRoleToChatRoom($roomName, $username, $role, array $requestOptions = [])
    {
        return $this->client->post(self::$endpoint . '/' . $roomName . '/' . $role . '/' . $username, $requestOptions);
    }

    /**
     * @param       $roomName
     * @param       $groupName
     * @param       $role
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function addGroupWithRoleToChatRoom($roomName, $groupName, $role, array $requestOptions = [])
    {
        return $this->client->post(self::$endpoint . '/' . $roomName . '/' . $role . '/group/' . $groupName, $requestOptions);
    }

    /**
     * @param       $roomName
     * @param       $username
     * @param       $role
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function deleteUserFromChatRoom($roomName, $username, $role, array $requestOptions = [])
    {
        return $this->client->delete(self::$endpoint . '/' . $roomName . '/' . $role . '/' . $username, $requestOptions);
    }

}