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

namespace Gnello\OpenFireRestAPI\Payloads\Models;

/**
 * Payload of RosterItem related REST Endpoint
 * Interface RosterItemInterface
 * @package Gnello\OpenFireRestAPI\Payloads\Models
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#rosteritem
 */
interface RosterItemInterface
{
    /**
     * Returns always the correct jid
     * @param $jid
     */
    public function setJid($jid);

    /**
     * @param $nickname
     */
    public function setNickname($nickname);

    /**
     * @param $subscriptionType
     * @throws \Exception
     */
    public function setSubscriptionType($subscriptionType);

    /**
     * @param array $groups
     */
    public function setGroups(array $groups);

    /**
     * Returns always the correct jid
     * @return string
     */
    public function getJid();

    /**
     * @return string
     */
    public function getNickname();

    /**
     * @return string
     */
    public function getSubscriptionType();

    /**
     * @return string
     */
    public function getGroups();
}