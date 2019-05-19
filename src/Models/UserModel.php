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
 * Class UserModel
 *
 * @package Gnello\OpenFireRestAPI\Models
 */
class UserModel extends ModelFoundation
{
    /**
     * @var string
     */
    public static $endpoint = 'users';

    /**
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function retrieveUsers(array $requestOptions = [])
    {
        return $this->client->get(self::$endpoint, $requestOptions);
    }

    /**
     * @param $username
     * @return ResponseInterface
     */
    public function retrieveUser($username)
    {
        return $this->client->get(self::$endpoint . '/' . $username);
    }

    /**
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function createUser(array $requestOptions)
    {
        return $this->client->post(self::$endpoint, $requestOptions);
    }

    /**
     * @param $username
     * @return ResponseInterface
     */
    public function deleteUser($username)
    {
        return $this->client->delete(self::$endpoint . '/' . $username);
    }

    /**
     * @param       $username
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function updateUser($username, array $requestOptions)
    {
        return $this->client->put(self::$endpoint . '/' . $username, $requestOptions);
    }

    /**
     * @param $username
     * @return ResponseInterface
     */
    public function retrieveAllUserGroups($username)
    {
        return $this->client->get(self::$endpoint . '/' . $username . '/groups');
    }

    /**
     * @param       $username
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function addUserToGroups($username, array $requestOptions)
    {
        return $this->client->post(self::$endpoint . '/' . $username . '/groups', $requestOptions);
    }

    /**
     * @param $username
     * @param $groupName
     * @return ResponseInterface
     */
    public function addUserToGroup($username, $groupName)
    {
        return $this->client->post(self::$endpoint . '/' . $username . '/groups/' . $groupName);
    }

    /**
     * @param       $username
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function deleteUserFromGroups($username, array $requestOptions)
    {
        return $this->client->delete(self::$endpoint . '/' . $username . '/groups', $requestOptions);
    }

    /**
     * @param $username
     * @param $groupName
     * @return ResponseInterface
     */
    public function deleteUserFromGroup($username, $groupName)
    {
        return $this->client->delete(self::$endpoint . '/' . $username . '/groups/' . $groupName);
    }

    /**
     * @param $username
     * @return ResponseInterface
     */
    public function lockoutUser($username)
    {
        return $this->client->post('/lockouts' . $username);
    }

    /**
     * @param $username
     * @return ResponseInterface
     */
    public function unlockUser($username)
    {
        return $this->client->delete('/lockouts' . $username);
    }

    /**
     * @param $username
     * @return ResponseInterface
     */
    public function retrieveUserRoster($username)
    {
        return $this->client->get(self::$endpoint . '/' . $username . '/roster');
    }

    /**
     * @param       $username
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function createUserRosterEntry($username, array $requestOptions)
    {
        return $this->client->post(self::$endpoint . '/' . $username . '/roster', $requestOptions);
    }

    /**
     * @param $username
     * @param $jid
     * @return ResponseInterface
     */
    public function deleteUserRosterEntry($username, $jid)
    {
        return $this->client->delete(self::$endpoint . '/' . $username . '/roster/' . $jid);
    }

    /**
     * @param       $username
     * @param       $jid
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function updateUserRosterEntry($username, $jid, array $requestOptions)
    {
        return $this->client->put(self::$endpoint . '/' . $username . '/roster/' . $jid, $requestOptions);
    }

}