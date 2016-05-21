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

namespace Nelcoa\OpenFireRestAPI\Payloads;

/**
 * Payload of User related REST Endpoints
 *
 * Parameter    Optional    Description
 * username     No          The username of the user
 * name         Yes         The name of the user
 * email        Yes         The email of the user
 * password     No          The password of the user
 * properties   Yes         List of properties. Property is a key / value object. The key must to be per user unique
 *
 * Class User
 * @package OpenFireRestAPI
 */
class User extends Payload
{
    private $username;
    private $name;
    private $email;
    private $password;
    private $properties;
}