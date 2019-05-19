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
 * Class SystemModel
 *
 * @package Gnello\OpenFireRestAPI\Models
 */
class SystemModel extends ModelFoundation
{
    /**
     * @var string
     */
    public static $endpoint = 'system';

    /**
     * @return ResponseInterface
     */
    public function retrieveAllSystemProperties()
    {
        return $this->client->get(self::$endpoint . '/properties');
    }

    /**
     * @param $propertyName
     * @return ResponseInterface
     */
    public function retrieveSystemProperty($propertyName)
    {
        return $this->client->get(self::$endpoint . '/properties/' . $propertyName);
    }

    /**
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function createSystemProperty(array $requestOptions)
    {
        return $this->client->post(self::$endpoint, $requestOptions);
    }

    /**
     * @param $propertyName
     * @return ResponseInterface
     */
    public function deleteSystemProperty($propertyName)
    {
        return $this->client->delete(self::$endpoint . '/properties/' . $propertyName);
    }

    /**
     * @param       $propertyName
     * @param array $requestOptions
     * @return ResponseInterface
     */
    public function updateSystemProperty($propertyName, array $requestOptions)
    {
        return $this->client->put(self::$endpoint . '/properties/' . $propertyName, $requestOptions);
    }

    /**
     * @return ResponseInterface
     */
    public function retrieveConcurrentSessions()
    {
        return $this->client->get(self::$endpoint . '/statistics/sessions');
    }

}