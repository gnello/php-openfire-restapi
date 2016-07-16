<?php
/**
 * OpenFireRestAPI is based entirely on official documentation of the REST API
 * Plugin and you can extend it by following the directives of the documentation
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/gnello/PHPOpenFireRestAPI/contributors
 *
 * @author Luca Agnello <lcagnello@gmail.com>
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */

namespace Gnello\OpenFireRestAPI;

/**
 * API manager
 * Class API
 * @package Gnello\OpenFireRestAPI
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#group-related-rest-endpoints
 */
class API
{
    /**
     * @var Settings\Settings
     */
    private $setting;

    /**
     * @var Endpoints\User
     */
    private $user;

    /**
     * @var Endpoints\ChatRoom
     */
    private $chatroom;

    /**
     * @var Endpoints\Group
     */
    private $group;

    /**
     * @var Endpoints\Message
     */
    private $message;

    /**
     * @var Endpoints\Session
     */
    private $session;

    /**
     * @var Endpoints\System
     */
    private $system;

    /**
     * API constructor.
     */
    public function __construct()
    {
        $this->setting      = new Settings\Settings();
        $this->user         = new Endpoints\User();
        $this->chatroom     = new Endpoints\ChatRoom();
        $this->group        = new Endpoints\Group();
        $this->message      = new Endpoints\Message();
        $this->session      = new Endpoints\Session();
        $this->system       = new Endpoints\System();
    }

    /**
     * @return Settings\Settings
     */
    public function Settings()
    {
        return $this->setting;
    }

    /**
     * @return Endpoints\User
     */
    public function User()
    {
        return $this->user;
    }

    /**
     * @return Endpoints\ChatRoom
     */
    public function ChatRoom()
    {
        return $this->chatroom;
    }

    /**
     * @return Endpoints\Group
     */
    public function Group()
    {
        return $this->group;
    }

    /**
     * @return Endpoints\Message
     */
    public function Message()
    {
        return $this->message;
    }

    /**
     * @return Endpoints\Session
     */
    public function Session()
    {
        return $this->session;
    }

    /**
     * @return Endpoints\System
     */
    public function System()
    {
        return $this->system;
    }
}