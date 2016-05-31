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
 * Property of User related REST Endpoint
 * Class Property
 * @package Nelcoa\OpenFireRestAPI\Response\User
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#user
 */
class Property
{
    /**
     * The key must to be per user unique
     * @var
     */
    private $key;

    /**
     * Value
     * @var
     */
    private $value;

    /**
     * Property constructor.
     * @param $stdClass
     */
    public function __construct($stdClass)
    {
        $this->key      = $stdClass->{'@key'};
        $this->value    = $stdClass->{'@value'};
    }
}