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
use \Gnello\OpenFireRestAPI\Settings\SubscriptionType;
use \Gnello\OpenFireRestAPI\Payloads;

/**
 * User related REST Endpoint
 * Class User
 * @package Gnello\OpenFireRestAPI\Endpoints
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#user-related-rest-endpoints
 */
class User extends Dispatcher
{
    public static $endpoint = '/users';

    /**
     * Get all or filtered users
     * @param string $search        Search/Filter by username.
     * @param string $propertyKey   Filter by user propertyKey.
     * @param string $propertyValue Filter by user propertyKey and propertyValue.
     * @return array with Users
     * @throws \Exception
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-users
     */
    public static function retrieveUsers($search = null, $propertyKey = null, $propertyValue = null)
    {
        if (!empty($propertyValue) && empty($propertyKey)) {
            throw new \Exception("propertyValue can only be used within propertyKey parameter!");
        }

        $getData = compact($search, $propertyKey, $propertyValue);
        $getData = http_build_query($getData);
        $endpoint = self::$endpoint . '?' . $getData;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Get information over a specific user
     * @param $username
     * @return array
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-a-user
     */
    public static function retrieveUser($username)
    {
        $endpoint = self::$endpoint . '/' . $username;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Create a new user
     * @param $username
     * @param $password
     * @param null $name
     * @param null $email
     * @param array $properties
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#create-a-user
     */
    public static function createUser($username, $password, $name = null, $email = null, $properties = array())
    {
        $payload = new Payloads\User(compact('username', 'password', 'name', 'email', 'properties'));
        return self::sendRequest(Method::POST, self::$endpoint, $payload);
    }

    /**
     * Delete a user
     * @param $username
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-user
     */
    public static function deleteUser($username)
    {
        $endpoint = self::$endpoint . '/' . $username;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * Update/rename a user
     * @param $username
     * @param $password
     * @param null $name
     * @param null $email
     * @param array $properties
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#update-a-user
     */
    public static function updateUser($username, $password, $name = null, $email = null, $properties = array())
    {
        $payload = new Payloads\User(compact('username', 'password', 'name', 'email', 'properties'));
        $endpoint = self::$endpoint . '/' . $username;
        return self::sendRequest(Method::PUT, $endpoint, $payload);
    }

    /**
     * Get group names of a specific user
     * @param $username
     * @return array with Group
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-all-user-Group
     */
    public static function retrieveAllUserGroups($username)
    {
        $endpoint = self::$endpoint . '/' . $username . Group::$endpoint;
        return self::sendRequest(Method::GET, $endpoint);
    }

    /**
     * Add user to a groups
     * @param $username
     * @param $groupname
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#add-user-to-groups
     */
    public static function addUserToGroups($username, $groupname)
    {
        $payload = new Payloads\Group(compact('groupname'));
        $endpoint = self::$endpoint . '/' . $username . Group::$endpoint;
        return self::sendRequest(Method::POST, $endpoint, $payload);
    }

    /**
     * Add user to a group
     * @param $username
     * @param $groupName
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#add-user-to-group
     */
    public static function addUserToGroup($username, $groupName)
    {
        $endpoint = self::$endpoint . '/' . $username . Group::$endpoint . '/' . $groupName;
        return self::sendRequest(Method::POST, $endpoint);
    }

    /**
     * Remove a user from a groups
     * @param $username
     * @param $groupname
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-user-from-a-groups
     */
    public static function deleteUserFromGroups($username, $groupname)
    {
        $payload = new Payloads\Group(compact('groupname'));
        $endpoint = self::$endpoint . '/' . $username . Group::$endpoint;
        return self::sendRequest(Method::DELETE, $endpoint, $payload);
    }

    /**
     * Remove a user from a group
     * @param $username
     * @param $groupName
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-user-from-a-group
     */
    public static function deleteUserFromGroup($username, $groupName)
    {
        $endpoint = self::$endpoint . '/' . $username . Group::$endpoint . '/' . $groupName;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * Lockout/ban the user from the chat server.
     * The user will be kicked if the user is online.
     * @param $username
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#lockout-a-user
     */
    public static function lockoutUser($username)
    {
        $endpoint = '/lockouts/' . $username;
        return self::sendRequest(Method::POST, $endpoint);
    }

    /**
     * Unlock/unban the user
     * @param $username
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#unlock-a-user
     */
    public static function unlockUser($username)
    {
        $endpoint = '/lockouts/' . $username;
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * Get roster entries (buddies) from a specific user
     * @param $username
     * @return array with Roster
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#retrieve-user-roster
     */
    public static function retrieveUserRoster($username)
    {
        $endpoint = self::$endpoint . '/' . $username . '/roster';
        return self::sendRequest(Method::GET,$endpoint);
    }

    /**
     * Add a new roster entry to a user
     * @param $username
     * @param $jid
     * @param null $nickname
     * @param int $subscriptionType
     * @param int $groups
     * @return array with HTTP status 201 (Created)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#create-a-user-roster-entry
     */
    public static function createUserRosterEntry($username, $jid, $nickname = null, $subscriptionType = SubscriptionType::BOTH, $groups)
    {
        $payload = new Payloads\RosterItem(compact('jid', 'nickname', 'subscriptionType', 'groups'));
        $endpoint = self::$endpoint . '/' . $username . '/roster';
        return self::sendRequest(Method::POST, $endpoint, $payload);
    }

    /**
     * Remove a roster entry from a user
     * @param $username
     * @param $jid
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#delete-a-user-roster-entry
     */
    public static function deleteUserRosterEntry($username, $jid)
    {
        $payload = new Payloads\RosterItem(compact('jid'));
        $endpoint = self::$endpoint . '/' . $username . '/roster/' . $payload->getJid();
        return self::sendRequest(Method::DELETE, $endpoint);
    }

    /**
     * Update a roster entry
     * @param $username
     * @param $jid
     * @param null $nickname
     * @param $subscriptionType
     * @param $groups
     * @return array with HTTP status 200 (OK)
     * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#update-a-user-roster-entry
     */
    public static function updateUserRosterEntry($username, $jid, $nickname = null, $subscriptionType = SubscriptionType::BOTH, $groups)
    {
        $payload = new Payloads\RosterItem(compact('jid', 'nickname', 'subscriptionType', 'groups'));
        $endpoint = self::$endpoint . '/' . $username. '/roster/' . $payload->getJid();
        return self::sendRequest(Method::PUT, $endpoint, $payload);
    }
}