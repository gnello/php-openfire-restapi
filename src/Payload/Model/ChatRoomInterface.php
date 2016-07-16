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

namespace Gnello\OpenFireRestAPI\Payload\Model;

/**
 * Payload of ChatRoom related REST Endpoint
 * Interface ChatRoomInterface
 * @package Gnello\OpenFireRestAPI\Payload\Model
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
     * @param array $broadcastPresenceRoles
     */
    public function setBroadcastPresenceRoles(array $broadcastPresenceRoles);

    /**
     * @param array $owners
     */
    public function setOwners(array $owners);

    /**
     * @param array $admins
     */
    public function setAdmins(array $admins);

    /**
     * @param array $members
     */
    public function setMembers(array $members);

    /**
     * @param array $outcasts
     */
    public function setOutcasts(array $outcasts);

    /**
     * @param array $ownerGroups
     */
    public function setOwnerGroups(array $ownerGroups);

    /**
     * @param array $adminGroups
     */
    public function setAdminGroups(array $adminGroups);

    /**
     * @param array $memberGroups
     */
    public function setMemberGroups(array $memberGroups);

    /**
     * @param array $outcastGroups
     */
    public function setOutcastGroups(array $outcastGroups);

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