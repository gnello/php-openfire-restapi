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

namespace Gnello\OpenFireRestAPI;

/**
 * API manager
 * Class API
 * @package Gnello\OpenFireRestAPI
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */
class API
{
    /**
     * @var Settings\Settings
     */
    private $settings;

    /**
     * @var Endpoints\User
     */
    private $users;

    /**
     * @var Endpoints\ChatRoom
     */
    private $chatrooms;

    /**
     * @var Endpoints\Group
     */
    private $groups;

    /**
     * @var Endpoints\Message
     */
    private $messages;

    /**
     * @var Endpoints\Session
     */
    private $sessions;

    /**
     * @var Endpoints\System
     */
    private $system;

    /**
     * API constructor.
     */
    public function __construct()
    {
        $this->settings     = new Settings\Settings();
        $this->users        = new Endpoints\User();
        $this->chatrooms    = new Endpoints\ChatRoom();
        $this->groups       = new Endpoints\Group();
        $this->messages     = new Endpoints\Message();
        $this->sessions     = new Endpoints\Session();
        $this->system       = new Endpoints\System();
    }

    /**
     * @return Settings\Settings
     */
    public function Settings()
    {
        return $this->settings;
    }

    /**
     * @return Endpoints\User
     */
    public function Users()
    {
        return $this->users;
    }

    /**
     * @return Endpoints\ChatRoom
     */
    public function ChatRooms()
    {
        return $this->chatrooms;
    }

    /**
     * @return Endpoints\Group
     */
    public function Groups()
    {
        return $this->groups;
    }

    /**
     * @return Endpoints\Message
     */
    public function Messages()
    {
        return $this->messages;
    }

    /**
     * @return Endpoints\Session
     */
    public function Sessions()
    {
        return $this->sessions;
    }

    /**
     * @return Endpoints\System
     */
    public function System()
    {
        return $this->system;
    }
}