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

namespace Nelcoa\OpenFireRestAPI\Payload;

use Nelcoa\OpenFireRestAPI\Payload\Model\IGroup;

/**
 * Payload of Group related REST Endpoint
 * Class Group
 * @package Nelcoa\OpenFireRestAPI\Payload
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#group
 */
class Group extends Payload implements IGroup
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

    /**
     *
     */
    private $groupname;

    /**
     * @param $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @param $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @param $admins
     */
    public function setAdmins($admins) {
        $this->admins = $admins;
    }

    /**
     * @param $members
     */
    public function setMembers($members) {
        $this->members = $members;
    }

    /**
     * @param $groupname
     */
    public function setGroupname($groupname) {
        $this->groupname = $groupname;
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
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getAdmins() {
        return $this->admins;
    }

    /**
     * @return string
     */
    public function getMembers() {
        return $this->members;
    }

    /**
     * @return string
     */
    public function getGroupname() {
        return $this->groupname;
    }
}