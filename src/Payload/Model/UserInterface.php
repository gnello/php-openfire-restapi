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

namespace Nelcoa\OpenFireRestAPI\Payload\Model;

/**
 * Payload of User related REST Endpoint
 * Interface UserInterface
 * @package Nelcoa\OpenFireRestAPI\Payload\Model
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