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
use Nelcoa\OpenFireRestAPI\Settings\Settings;

/**
 * Payload of RosterItem related REST Endpoints
 * Class RosterItem
 * @package OpenFireRestAPI
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#rosteritem
 */
class RosterItem extends Payload
{
    /**
     * The JID of the roster item
     * Optional No
     * @var string
     */
    private $jid;

    /**
     * The nickname for the user when used in this roster
     * Optional Yes
     * @var string
     */
    private $nickname;

    /**
     * The subscription type
     * Possible numeric values are: -1 (remove), 0 (none), 1 (to), 2 (from), 3 (both)
     * Optional Yes
     * @var integer
     */
    private $subscriptionType;

    /**
     * A list of groups to organize roster entries under (e.g. friends, co-workers, etc.)
     * Optional No
     * @var array
     */
    private $groups;

    /**
     * Returns always the correct jid
     * @param $jid
     */
    protected function setJid($jid) {
        if (strpos('@' . Settings::$serverName, $jid) === false) {
            $jid .= '@' . Settings::$serverName;
        }
        $this->jid = $jid;;
    }

    /**
     * @param $nickname
     */
    protected function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    /**
     * @param $subscriptionType
     */
    protected function setSubscriptionType($subscriptionType) {
        $this->subscriptionType = $subscriptionType;
    }

    /**
     * @param $groups
     */
    protected function setGroups($groups) {
        $this->groups['group'] = $groups;
    }

    /**
     * Returns always the correct jid
     * @return string
     */
    public function getJid() {
        return $this->jid;
    }

    /**
     * @return string
     */
    protected function getNickname() {
        return $this->nickname;
    }

    /**
     * @return string
     */
    protected function getSubscriptionType() {
        return $this->subscriptionType;
    }

    /**
     * @return string
     */
    protected function getGroups() {
        return $this->groups;
    }
}