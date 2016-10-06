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
 * Class AuthenticationToken
 * @package Gnello\OpenFireRestAPI
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */
class AuthenticationToken
{
    /**
     * Authentication constants, do not touch ;)
     */
    const AUTH_BASE         = 'basic';
    const AUTH_SECRET_KEY   = 'secret_key';

    /**
     * @var string
     */
    private $authMode;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $sharedSecretKey;

    /**
     * AuthenticationToken constructor.
     */
    public function __construct()
    {
        $arguments = func_get_args();
        $num = func_num_args();

        switch ($num) {
            case 1:
                $this->authMode = self::AUTH_SECRET_KEY;
                $this->sharedSecretKey = $arguments[0];
                break;
            case 2:
                $this->authMode = self::AUTH_BASE;
                $this->username = $arguments[0];
                $this->password = $arguments[1];
                break;
            default:
                break;
        }
    }

    /**
     * Return type of authentication.
     * @return string
     */
    public function getAuthMode()
    {
        return $this->authMode;
    }

    /**
     * @return string
     */
    public function getSharedSecretKey()
    {
        return $this->sharedSecretKey;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return null|string
     */
    public function getAuthToken()
    {
        switch ($this->getAuthMode()) {
            case self::AUTH_BASE:
                $authToken = "basic " . base64_encode($this->getUsername() . ":" . $this->getPassword());
                break;
            case self::AUTH_SECRET_KEY:
                $authToken = $this->getSharedSecretKey();
                break;
            default:
                $authToken = null;
                break;
        }

        return $authToken;
    }
}