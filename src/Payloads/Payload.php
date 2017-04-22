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
 * Payload creator
 * Class Payload
 * @package Gnello\OpenFireRestAPI\Payloads
 */
class Payload
{
    /**
     * @return ChatRoomPayload
     */
    public function createChatRoomPayload() {
        $args = func_get_args();
        return new ChatRoomPayload($args);
    }

    /**
     * @return GroupPayload
     */
    public function createGroupPayload() {
        $args = func_get_args();
        return new GroupPayload($args);
    }

    /**
     * @return MessagePayload
     */
    public function createMessagePayload() {
        $args = func_get_args();
        return new MessagePayload($args);
    }

    /**
     * @return RosterItemPayload
     */
    public function createRosterItemPayload() {
        $args = func_get_args();
        return new RosterItemPayload($args);
    }

    /**
     * @return SystemPropertyPayload
     */
    public function createSystemPropertyPayload() {
        $args = func_get_args();
        return new SystemPropertyPayload($args);
    }

    /**
     * @return UserPayload
     */
    public function createUserPayload() {
        $args = func_get_args();
        return new UserPayload($args);
    }
}