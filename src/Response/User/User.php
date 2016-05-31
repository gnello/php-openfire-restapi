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

namespace Nelcoa\OpenFireRestAPI\Response\User;

/**
 * Response of User related REST Endpoint
 * Class User
 * @package Nelcoa\OpenFireRestAPI\Response\User
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#user
 */
class User
{
    /**
     * The username of the user
     * @var string $username
     */
    private $username;

    /**
     * The name of the user
     * @var string $name
     */
    private $name;

    /**
     * The email of the user
     * @var string $email
     */
    private $email;

    /**
     * List of properties. Property is a key / value object. The key must to be per user unique
     * @var array $properties
     */
    private $properties = array();

    /**
     * User constructor.
     * @param \stdClass $output
     */
    final protected function __construct(\stdClass $output)
    {
        $this->username = $output->username;
        $this->name = $output->name;
        $this->email = $output->email;

        foreach ($output->properties->property as $stdClass) {
            $this->properties[$stdClass->{'@key'}] = new Property($stdClass);
        }
    }

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
     * @return array
     */
    public function getProperties() {
        return $this->properties;
    }

}