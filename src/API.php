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

namespace Nelcoa\OpenFireRestAPI;

/**
 * Group related REST Endpoint
 * Class Group
 * @package OpenFireRestAPI
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#group-related-rest-endpoints
 */
class API
{
    /**
     * @var Setting\Setting
     */
    private $setting;

    /**
     * @var Endpoint\User
     */
    private $user;

    /**
     * @var Endpoint\ChatRoom
     */
    private $chatroom;

    /**
     * @var Endpoint\Group
     */
    private $group;

    /**
     * @var Endpoint\Message
     */
    private $message;

    /**
     * @var Endpoint\Session
     */
    private $session;

    /**
     * @var Endpoint\System
     */
    private $system;

    /**
     * API constructor.
     */
    public function __construct()
    {
        $this->setting      = new Setting\Setting();
        $this->user         = new Endpoint\User();
        $this->chatroom     = new Endpoint\ChatRoom();
        $this->group        = new Endpoint\Group();
        $this->message      = new Endpoint\Message();
        $this->session      = new Endpoint\Session();
        $this->system       = new Endpoint\System();
    }

    /**
     * @return Setting\Setting
     */
    public function Setting()
    {
        return $this->setting;
    }

    /**
     * @return Endpoint\User
     */
    public function User()
    {
        return $this->user;
    }

    /**
     * TODO: implements ChatRoom
     * @return Endpoint\ChatRoom
     */
    private function ChatRoom()
    {
        return $this->chatroom;
    }

    /**
     * @return Endpoint\Group
     */
    public function Group()
    {
        return $this->Group;
    }

    /**
     * @return Endpoint\Message
     */
    public function Message()
    {
        return $this->message;
    }

    /**
     * @return Endpoint\Session
     */
    public function Session()
    {
        return $this->session;
    }

    /**
     * @return Endpoint\System
     */
    public function System()
    {
        return $this->system;
    }
}