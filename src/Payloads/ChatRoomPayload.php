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

namespace Gnello\OpenFireRestAPI\Payloads;

/**
 * Payload of Group related REST Endpoint
 * Class ChatRoomPayload
 * @package Gnello\OpenFireRestAPI\Payloads
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#chat-room-related-rest-endpoints
 */
class ChatRoomPayload extends AbstractPayload
{
    /**
     * The name/id of the room. Can only contains lowercase and alphanumeric characters.
     * Optional No
     * @var string
     */
    private $roomName;

    /**
     * Also the name of the room, but can contains non alphanumeric characters. It’s mainly
     * used for users while discovering rooms hosted by the Multi-User Chat service.
     * Optional No
     * @var string
     */
    private $naturalName;

    /**
     * Description text of the room.
     * Optional No
     * @var string
     */
    private $description;

    /**
     * Subject of the room.
     * Optional Yes
     * @var string
     */
    private $subject;

    /**
     * The password that the user must provide to enter the room
     * Optional Yes
     * @var string
     */
    private $password;

    /**
     * The date when the room was created. Will be automatically set by creation.
     * Example: 2014-07-10T09:49:12.411+02:00
     * Optional Yes
     *
     * @var string
     */
    private $creationDate;

    /**
     * The last date when the room’s configuration was modified. If the room’s configuration
     * was never modified then the initial value will be the same as the creation date.
     * Will be automatically set by update. Example: 2014-07-10T09:49:12.411+02:00
     * Optional Yes
     * @var string
     */
    private $modificationDate;

    /**
     * The maximum number of occupants that can be simultaneously in the room.
     * 0 means unlimited number of occupants.
     * Optional Yes
     * @var integer
     */
    private $maxUsers;

    /**
     * Can be “true” or “false”. Persistent rooms are saved to the database to make
     * their configurations persistent together with the affiliation of the users.
     * Otherwise the room will be destroyed if the last occupant leave the room.
     * Optional Yes
     * @var bool
     */
    private $persistent = true;

    /**
     * Can be “true” or “false”. True if the room is searchable and visible through
     * service discovery.
     * Optional Yes
     * @var bool
     */
    private $publicRoom;

    /**
     * Can be “true” or “false”. True if users are allowed to register with the room.
     * By default, room registration is enabled.
     * Optional Yes
     * @var bool
     */
    private $registrationEnabled;

    /**
     * Can be “true” or “false”. True if every presence packet will include the JID
     * of every occupant.
     * Optional Yes
     * @var bool
     */
    private $canAnyoneDiscoverJID;

    /**
     * Can be “true” or “false”. True if participants are allowed to change the room’s subject.
     * Optional Yes
     * @var bool
     */
    private $canOccupantsChangeSubject;

    /**
     * Can be “true” or “false”. True if occupants can invite other users to the room.
     * If the room does not require an invitation to enter (i.e. is not members-only)
     * then any occupant can send invitations. On the other hand, if the room is members-only
     * and occupants cannot send invitation then only the room owners and admins are allowed
     * to send invitations.
     * Optional Yes
     * @var bool
     */
    private $canOccupantsInvite;

    /**
     * Can be “true” or “false”. True if room occupants are allowed to change their nicknames
     * in the room. By default, occupants are allowed to change their nicknames.
     * Optional Yes
     * @var bool
     */
    private $canChangeNickname;

    /**
     * Can be “true” or “false”. True if the room’s conversation is being logged. If logging
     * is activated the room conversation will be saved to the database every couple of minutes.
     * The saving frequency is the same for all the rooms and can be configured by changing
     * the property “xmpp.muc.tasks.log.timeout”.
     * Optional Yes
     * @var bool
     */
    private $logEnabled;

    /**
     * Can be “true” or “false”. True if registered users can only join the room using their
     * registered nickname. By default, registered users can join the room using any nickname.
     * Optional Yes
     * @var bool
     */
    private $loginRestrictedToNickname;

    /**
     * Can be “true” or “false”. True if the room requires an invitation to enter.
     * That is if the room is members-only.
     * Optional Yes
     * @var bool
     */
    private $membersOnly;

    /**
     * Can be “true” or “false”. True if the room in which only those with “voice”
     * may send messages to all occupants.
     * Optional Yes
     * @var bool
     */
    private $moderated;

    /**
     * The list of roles of which presence will be broadcasted to the rest of the occupants.
     * Optional Yes
     * @var array
     */
    private $broadcastPresenceRoles;

    /**
     * A collection with the current list of owners. The collection contains the bareJID
     * of the users with owner affiliation.
     * Optional Yes
     * @var array
     */
    private $owners;

    /**
     * A collection with the current list of admins. The collection contains
     * the bareJID of the users with admin affiliation.
     * Optional Yes
     * @var array
     */
    private $admins;

    /**
     * A collection with the current list of room members. The collection
     * contains the bareJID of the users with member affiliation. If the
     * room is not members-only then the list will contain the users that
     * registered with the room and therefore they may have reserved a nickname.
     * Optional Yes
     * @var array
     */
    private $members;

    /**
     * A collection with the current list of outcast users. An outcast user
     * is not allowed to join the room again. The collection contains the
     * bareJID of the users with outcast affiliation.
     * Optional Yes
     * @var array
     */
    private $outcasts;

    /**
     * A collection with the current list of groups with owner affiliation.
     * The collection contains the name only.
     * Optional Yes
     * @var array
     */
    private $ownerGroups;

    /**
     * A collection with the current list of groups with admin affiliation.
     * The collection contains the name only.
     * Optional Yes
     * @var array
     */
    private $adminGroups;

    /**
     * 	A collection with the current list of groups with member affiliation.
     * The collection contains the name only.
     * Optional Yes
     * @var array
     */
    private $memberGroups;

    /**
     * A collection with the current list of groups with outcast affiliation.
     * The collection contains the name only.
     * Optional Yes
     * @var array
     */
    private $outcastGroups;
    
    /**
     * @param $roomName
     */
    public function setRoomName($roomName)
    {
        $this->roomName = $roomName;
    }

    /**
     * @param $naturalName
     */
    public function setNaturalName($naturalName)
    {
        $this->naturalName = $naturalName;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @param $modificationDate
     */
    public function setModificationDate($modificationDate)
    {
        $this->modificationDate = $modificationDate;
    }

    /**
     * @param $maxUsers
     */
    public function setMaxUsers($maxUsers)
    {
        $this->maxUsers = $maxUsers;
    }

    /**
     * @param $persistent
     */
    public function setPersistent($persistent)
    {
        $this->persistent = $persistent;
    }

    /**
     * @param $publicRoom
     */
    public function setPublicRoom($publicRoom)
    {
        $this->publicRoom = $publicRoom;
    }

    /**
     * @param $registrationEnabled
     */
    public function setRegistrationEnabled($registrationEnabled)
    {
        $this->registrationEnabled = $registrationEnabled;
    }

    /**
     * @param $canAnyoneDiscoverJID
     */
    public function setCanAnyoneDiscoverJID($canAnyoneDiscoverJID)
    {
        $this->canAnyoneDiscoverJID = $canAnyoneDiscoverJID;
    }

    /**
     * @param $canOccupantsChangeSubject
     */
    public function setCanOccupantsChangeSubject($canOccupantsChangeSubject)
    {
        $this->canOccupantsChangeSubject = $canOccupantsChangeSubject;
    }

    /**
     * @param $canOccupantsInvite
     */
    public function setCanOccupantsInvite($canOccupantsInvite)
    {
        $this->canOccupantsInvite = $canOccupantsInvite;
    }

    /**
     * @param $canChangeNickname
     */
    public function setCanChangeNickname($canChangeNickname)
    {
        $this->canChangeNickname = $canChangeNickname;
    }

    /**
     * @param $logEnabled
     */
    public function setLogEnabled($logEnabled)
    {
        $this->logEnabled = $logEnabled;
    }

    /**
     * @param $loginRestrictedToNickname
     */
    public function setLoginRestrictedToNickname($loginRestrictedToNickname)
    {
        $this->loginRestrictedToNickname = $loginRestrictedToNickname;
    }

    /**
     * @param $membersOnly
     */
    public function setMembersOnly($membersOnly)
    {
        $this->membersOnly = $membersOnly;
    }

    /**
     * @param $moderated
     */
    public function setModerated($moderated)
    {
        $this->moderated = $moderated;
    }

    /**
     * @param array $broadcastPresenceRoles
     */
    public function setBroadcastPresenceRoles(array $broadcastPresenceRoles)
    {
        $this->broadcastPresenceRoles['broadcastPresenceRole'] = $broadcastPresenceRoles;
    }

    /**
     * @param array $owners
     */
    public function setOwners(array $owners)
    {
        $this->owners['owner'] = $owners;
    }

    /**
     * @param array $admins
     */
    public function setAdmins(array $admins)
    {
        $this->admins['admin'] = $admins;
    }

    /**
     * @param array $members
     */
    public function setMembers(array $members)
    {
        $this->members['member'] = $members;
    }

    /**
     * @param array $outcasts
     */
    public function setOutcasts(array $outcasts)
    {
        $this->outcasts['outcast'] = $outcasts;
    }

    /**
     * @param array $ownerGroups
     */
    public function setOwnerGroups(array $ownerGroups)
    {
        $this->ownerGroups['ownerGroup'] = $ownerGroups;
    }

    /**
     * @param array $adminGroups
     */
    public function setAdminGroups(array $adminGroups)
    {
        $this->adminGroups['adminGroup'] = $adminGroups;
    }

    /**
     * @param array $memberGroups
     */
    public function setMemberGroups(array $memberGroups)
    {
        $this->memberGroups['memberGroup'] = $memberGroups;
    }

    /**
     * @param array $outcastGroups
     */
    public function setOutcastGroups(array $outcastGroups)
    {
        $this->outcastGroups['outcastGroup'] = $outcastGroups;
    }

    /**
     * @return string
     */
    public function getRoomName()
    {
        return $this->roomName;
    }

    /**
     * @return string
     */
    public function getNaturalName()
    {
        return $this->naturalName;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @return string
     */
    public function getModificationDate()
    {
        return $this->modificationDate;
    }

    /**
     * @return integer
     */
    public function getMaxUsers()
    {
        return $this->maxUsers;
    }

    /**
     * @return bool
     */
    public function getPersistent()
    {
        return $this->persistent;
    }

    /**
     * @return bool
     */
    public function getPublicRoom()
    {
        return $this->publicRoom;
    }

    /**
     * @return bool
     */
    public function getRegistrationEnabled()
    {
        return $this->registrationEnabled;
    }

    /**
     * @return bool
     */
    public function getCanAnyoneDiscoverJID()
    {
        return $this->canAnyoneDiscoverJID;
    }

    /**
     * @return bool
     */
    public function getCanOccupantsChangeSubject()
    {
        return $this->canOccupantsChangeSubject;
    }

    /**
     * @return bool
     */
    public function getCanOccupantsInvite()
    {
        return $this->canOccupantsInvite;
    }

    /**
     * @return bool
     */
    public function getCanChangeNickname()
    {
        return $this->canChangeNickname;
    }

    /**
     * @return bool
     */
    public function getLogEnabled()
    {
        return $this->logEnabled;
    }

    /**
     * @return bool
     */
    public function getLoginRestrictedToNickname()
    {
        return $this->loginRestrictedToNickname;
    }

    /**
     * @return bool
     */
    public function getMembersOnly()
    {
        return $this->membersOnly;
    }

    /**
     * @return bool
     */
    public function getModerated()
    {
        return $this->moderated;
    }

    /**
     * @return array
     */
    public function getBroadcastPresenceRoles()
    {
        return $this->broadcastPresenceRoles;
    }

    /**
     * @return array
     */
    public function getOwners()
    {
        return $this->owners;
    }

    /**
     * @return array
     */
    public function getAdmins()
    {
        return $this->admins;
    }

    /**
     * @return array
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @return array
     */
    public function getOutcasts()
    {
        return $this->outcasts;
    }

    /**
     * @return array
     */
    public function getOwnerGroups()
    {
        return $this->ownerGroups;
    }

    /**
     * @return array
     */
    public function getAdminGroups()
    {
        return $this->adminGroups;
    }

    /**
     * @return array
     */
    public function getMemberGroups()
    {
        return $this->memberGroups;
    }

    /**
     * @return array
     */
    public function getOutcastGroups()
    {
        return $this->outcastGroups;
    }
}