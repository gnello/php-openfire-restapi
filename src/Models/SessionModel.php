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
 * Class SessionModel
 *
 * @package Gnello\OpenFireRestAPI\Models
 */
class SessionModel extends ModelFoundation
{
    /**
     * @var string
     */
    public static $endpoint = 'sessions';

    /**
     * @return ResponseInterface
     */
    public function retrieveAllUserSessions()
    {
        return $this->client->get(self::$endpoint);
    }

    /**
     * @param $username
     * @return ResponseInterface
     */
    public function retrieveUserSessions($username)
    {
        return $this->client->get(self::$endpoint . '/' . $username);
    }

    /**
     * @param $username
     * @return ResponseInterface
     */
    public function closeAllUserSessions($username)
    {
        return $this->client->delete(self::$endpoint . '/' . $username);
    }

}