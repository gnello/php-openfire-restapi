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
     * @var Endpoints\UserEndpoint
     */
    private $users;

    /**
     * @var Endpoints\ChatRoomEndpoint
     */
    private $chatrooms;

    /**
     * @var Endpoints\GroupEndpoint
     */
    private $groups;

    /**
     * @var Endpoints\MessageEndpoint
     */
    private $messages;

    /**
     * @var Endpoints\SessionEndpoint
     */
    private $sessions;

    /**
     * @var Endpoints\SystemEndpoint
     */
    private $system;

    /**
     * @var Payloads\Payload
     */
    private $payloads;

    /**
     * @var Utils\Debugger
     */
    private $debugger;

    /**
     * API constructor.
     * @param                     $host
     * @param                     $port
     * @param AuthenticationToken $authenticationToken
     */
    public function __construct($host, $port, AuthenticationToken $authenticationToken)
    {
        $settings = Settings\Settings::getInstance();
        $settings->setHost($host);
        $settings->setPort($port);
        $settings->setServerNameFromHost($host);
        $settings->setAuthenticationToken($authenticationToken);

        $this->settings     = $settings;
        $this->users        = new Endpoints\UserEndpoint();
        $this->chatrooms    = new Endpoints\ChatRoomEndpoint();
        $this->groups       = new Endpoints\GroupEndpoint();
        $this->messages     = new Endpoints\MessageEndpoint();
        $this->sessions     = new Endpoints\SessionEndpoint();
        $this->system       = new Endpoints\SystemEndpoint();
        $this->payloads     = new Payloads\Payload();
        $this->debugger     = Utils\Debugger::getInstance();
    }

    /**
     * @return Settings\Settings
     */
    public function Settings()
    {
        return $this->settings;
    }

    /**
     * @return Endpoints\UserEndpoint
     */
    public function Users()
    {
        return $this->users;
    }

    /**
     * @return Endpoints\ChatRoomEndpoint
     */
    public function ChatRooms()
    {
        return $this->chatrooms;
    }

    /**
     * @return Endpoints\GroupEndpoint
     */
    public function Groups()
    {
        return $this->groups;
    }

    /**
     * @return Endpoints\MessageEndpoint
     */
    public function Messages()
    {
        return $this->messages;
    }

    /**
     * @return Endpoints\SessionEndpoint
     */
    public function Sessions()
    {
        return $this->sessions;
    }

    /**
     * @return Endpoints\SystemEndpoint
     */
    public function System()
    {
        return $this->system;
    }

    /**
     * @return Payloads\Payload
     */
    public function Payloads()
    {
        return $this->payloads;
    }

    /**
     * @return Utils\Debugger
     */
    public function Debugger()
    {
        return $this->debugger;
    }
}