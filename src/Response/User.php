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

namespace Nelcoa\OpenFireRestAPI\Response;

/**
 * TODO: da pensare fare implementare
 * Response of User related REST Endpoint
 * Class User
 * @package Nelcoa\OpenFireRestAPI\Response
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#user
 */
class User
{
    /**
     * The username of the user
     * Optional No
     * @var string
     */
    private $username;

    /**
     * The name of the user
     * Optional Yes
     * @var string
     */
    private $name;

    /**
     * The email of the user
     * Optional Yes
     * @var string
     */
    private $email;

    /**
     * The password of the user
     * Optional No
     * @var string
     */
    private $password;

    /**
     * List of properties. Property is a key/value object. The key must to be per user unique
     * Optional Yes
     * @var array
     */
    private $properties;

    /**
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getProperties() {
        return $this->properties;
    }
}