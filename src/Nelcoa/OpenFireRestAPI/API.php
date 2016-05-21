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
 * Group related REST Endpoints
 * Class Groups
 * @package OpenFireRestAPI
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#group-related-rest-endpoints
 */
class API
{
    /**
     * @var Settings\Settings
     */
    private $settings;

    /**
     * @var Endpoints\Users
     */
    private $users;

    /**
     * @var Endpoints\ChatRooms
     */
    private $chatrooms;

    /**
     * @var Endpoints\Groups
     */
    private $groups;

    /**
     * @var Endpoints\Messages
     */
    private $messages;

    /**
     * @var Endpoints\Sessions
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
        $this->users        = new Endpoints\Users();
        $this->chatrooms    = new Endpoints\ChatRooms();
        $this->groups       = new Endpoints\Groups();
        $this->messages     = new Endpoints\Messages();
        $this->sessions     = new Endpoints\Sessions();
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
     * @return Endpoints\Users
     */
    public function Users()
    {
        return $this->users;
    }

    /**
     * @return Endpoints\ChatRooms
     */
    public function ChatRooms()
    {
        return $this->chatrooms;
    }

    /**
     * @return Endpoints\Groups
     */
    public function Groups()
    {
        return $this->groups;
    }

    /**
     * @return Endpoints\Messages
     */
    public function Messages()
    {
        return $this->messages;
    }

    /**
     * @return Endpoints\Sessions
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