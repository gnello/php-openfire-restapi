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

use Gnello\OpenFireRestAPI\Payloads\Models\RosterItemInterface;
use Gnello\OpenFireRestAPI\Settings\Settings;
use Gnello\OpenFireRestAPI\Settings\SubscriptionType;

/**
 * Payload of RosterItem related REST Endpoint
 * Class RosterItem
 * @package Gnello\OpenFireRestAPI\Payloads
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#rosteritem
 */
class RosterItem extends AbstractPayload implements RosterItemInterface
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
    public function setJid($jid) {
        if (strpos('@' . Settings::getServerName(), $jid) === false) {
            $jid .= '@' . Settings::getServerName();
        }
        $this->jid = $jid;;
    }

    /**
     * @param $nickname
     */
    public function setNickname($nickname) {
        $this->nickname = $nickname;
    }

    /**
     * @param $subscriptionType
     * @throws \Exception
     */
    public function setSubscriptionType($subscriptionType) {
        if (!SubscriptionType::isValid($subscriptionType)) {
            throw new \Exception("SubscriptionType not valid!");
        }
        $this->subscriptionType = $subscriptionType;
    }

    /**
     * @param array $groups
     */
    public function setGroups(array $groups) {
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
    public function getNickname() {
        return $this->nickname;
    }

    /**
     * @return string
     */
    public function getSubscriptionType() {
        return $this->subscriptionType;
    }

    /**
     * @return string
     */
    public function getGroups() {
        return $this->groups;
    }
}