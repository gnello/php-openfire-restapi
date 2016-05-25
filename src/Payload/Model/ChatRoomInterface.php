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
 * Payload of ChatRoom related REST Endpoint
 * Interface ChatRoomInterface
 * @package Nelcoa\OpenFireRestAPI\Payload\Model
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#chat-room-related-rest-endpoints
 */
interface ChatRoomInterface
{
    /**
     * @param $roomName
     */
    public function setRoomName($roomName);

    /**
     * @param $naturalName
     */
    public function setNaturalName($naturalName);

    /**
     * @param $description
     */
    public function setDescription($description);

    /**
     * @param $subject
     */
    public function setSubject($subject);

    /**
     * @param $password
     */
    public function setPassword($password);

    /**
     * @param $creationDate
     */
    public function setCreationDate($creationDate);

    /**
     * @param $modificationDate
     */
    public function setModificationDate($modificationDate);

    /**
     * @param $maxUsers
     */
    public function setMaxUsers($maxUsers);

    /**
     * @param $persistent
     */
    public function setPersistent($persistent);

    /**
     * @param $publicRoom
     */
    public function setPublicRoom($publicRoom);

    /**
     * @param $registrationEnabled
     */
    public function setRegistrationEnabled($registrationEnabled);

    /**
     * @param $canAnyoneDiscoverJID
     */
    public function setCanAnyoneDiscoverJID($canAnyoneDiscoverJID);

    /**
     * @param $canOccupantsChangeSubject
     */
    public function setCanOccupantsChangeSubject($canOccupantsChangeSubject);

    /**
     * @param $canOccupantsInvite
     */
    public function setCanOccupantsInvite($canOccupantsInvite);

    /**
     * @param $canChangeNickname
     */
    public function setCanChangeNickname($canChangeNickname);

    /**
     * @param $logEnabled
     */
    public function setLogEnabled($logEnabled);

    /**
     * @param $loginRestrictedToNickname
     */
    public function setLoginRestrictedToNickname($loginRestrictedToNickname);

    /**
     * @param $membersOnly
     */
    public function setMembersOnly($membersOnly);

    /**
     * @param $moderated
     */
    public function setModerated($moderated);

    /**
     * @param $broadcastPresenceRoles
     */
    public function setBroadcastPresenceRoles($broadcastPresenceRoles);

    /**
     * @param $owners
     */
    public function setOwners($owners);

    /**
     * @param $admins
     */
    public function setAdmins($admins);

    /**
     * @param $members
     */
    public function setMembers($members);

    /**
     * @param $outcasts
     */
    public function setOutcasts($outcasts);

    /**
     * @param $ownerGroups
     */
    public function setOwnerGroups($ownerGroups);

    /**
     * @param $adminGroups
     */
    public function setAdminGroups($adminGroups);

    /**
     * @param $memberGroups
     */
    public function setMemberGroups($memberGroups);

    /**
     * @param $outcastGroups
     */
    public function setOutcastGroups($outcastGroups);

    /**
     * @return string
     */
    public function getRoomName();

    /**
     * @return string
     */
    public function getNaturalName();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getSubject();

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @return string
     */
    public function getCreationDate();

    /**
     * @return string
     */
    public function getModificationDate();

    /**
     * @return integer
     */
    public function getMaxUsers();

    /**
     * @return bool
     */
    public function getPersistent();

    /**
     * @return bool
     */
    public function getPublicRoom();

    /**
     * @return bool
     */
    public function getRegistrationEnabled();

    /**
     * @return bool
     */
    public function getCanAnyoneDiscoverJID();

    /**
     * @return bool
     */
    public function getCanOccupantsChangeSubject();

    /**
     * @return bool
     */
    public function getCanOccupantsInvite();

    /**
     * @return bool
     */
    public function getCanChangeNickname();

    /**
     * @return bool
     */
    public function getLogEnabled();

    /**
     * @return bool
     */
    public function getLoginRestrictedToNickname();

    /**
     * @return bool
     */
    public function getMembersOnly();

    /**
     * @return bool
     */
    public function getModerated();

    /**
     * @return array
     */
    public function getBroadcastPresenceRoles();

    /**
     * @return array
     */
    public function getOwners();

    /**
     * @return array
     */
    public function getAdmins();

    /**
     * @return array
     */
    public function getMembers();

    /**
     * @return array
     */
    public function getOutcasts();

    /**
     * @return array
     */
    public function getOwnerGroups();

    /**
     * @return array
     */
    public function getAdminGroups();

    /**
     * @return array
     */
    public function getMemberGroups();

    /**
     * @return array
     */
    public function getOutcastGroups();


}