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

namespace Gnello\OpenFireRestAPI\Payloads\Models;

/**
 * Payload of User related REST Endpoint
 * Interface UserInterface
 * @package Gnello\OpenFireRestAPI\Payloads\Models
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#user
 */
interface UserInterface
{
    /**
     * @param $username
     */
    public function setUsername($username);

    /**
     * @param $name
     */
    public function setName($name);

    /**
     * @param $email
     */
    public function setEmail($email);

    /**
     * @param $password
     */
    public function setPassword($password);

    /**
     * @param array $properties
     */
    public function setProperties(array $properties);

    /**
     * @return string
     */
    public function getUsername();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @return array
     */
    public function getProperties();
}