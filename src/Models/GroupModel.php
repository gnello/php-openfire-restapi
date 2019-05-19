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
 * Class GroupModel
 *
 * @package Gnello\OpenFireRestAPI\Models
 */
class GroupModel extends ModelFoundation
{
    /**
     * @var string
     */
    public static $endpoint = 'groups';

    /**
     * @return ResponseInterface
     */
    public function retrieveAllGroups()
    {
        return $this->client->get(self::$endpoint);
    }

    /**
     * @param $groupName
     * @return ResponseInterface
     */
    public function retrieveGroup($groupName)
    {
        return $this->client->get(self::$endpoint . '/' . $groupName);
    }

    /**
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function createGroup(array $requestOptions)
    {
        return $this->client->post(self::$endpoint, $requestOptions);
    }

    /**
     * @param $groupName
     * @return ResponseInterface
     */
    public function deleteGroup($groupName)
    {
        return $this->client->delete(self::$endpoint . '/' . $groupName);
    }

    /**
     * @param       $groupName
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function updateGroup($groupName, array $requestOptions)
    {
        return $this->client->put(self::$endpoint . '/' . $groupName, $requestOptions);
    }

}