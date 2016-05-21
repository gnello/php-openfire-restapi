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
 * Payload of Group related REST Endpoints
 * Class Group
 * @package OpenFireRestAPI
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#group
 */
class Group extends Payload
{
    /**
     * The name of the group
     * Optional No
     * @var string
     */
    private $name;

    /**
     * The description of the group
     * Optional No
     * @var string
     */
    private $description;

    /**
     * A collection with current admins of the group
     * Optional Yes
     * @var array
     */
    private $admins;

    /**
     * A collection with current members of the group
     * Optional Yes
     * @var array
     */
    private $members;
}