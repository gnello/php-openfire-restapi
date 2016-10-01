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

namespace Gnello\OpenFireRestAPI\Settings;

use Gnello\OpenFireRestAPI\Wrappers\AbstractRegistryWrapper;

/**
 * Class Settings
 * @package Gnello\OpenFireRestAPI\Settings
 */
class Settings extends AbstractRegistryWrapper
{
    /**
     * Default Settings
     * Edit this section to configure your client
     */
    const HOST          = 'localhost';
    const PORT          = '9090';
    const PLUGIN        = '/plugins/restapi/v1';
    const AUTH          = 'secret_key';

    /**
     * Settings that you need to change
     * Edit this section to configure your client
     */
    const SERVER_NAME   = 'your_server_name';
    const SECRET_KEY    = 'your_secret_key';    //if you use secret_key authentication
    const USER          = 'your_username';      //if you use basic authentication
    const PSW           = 'your_password';      //if you use basic authentication

    /**
     * Authentication constants
     */
    const AUTH_BASE         = 1;
    const AUTH_SECRET_KEY   = 2;

    /**
     * @var Settings
     */
    private static $instance;

    /**
     * Settings constructor.
     */
    private function __construct() {}

    /**
     * @return Settings
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            $settings = new Settings();
            $settings->setAuth(self::AUTH);
            $settings->setHost(self::HOST);
            $settings->setPort(self::PORT);
            $settings->setPlugin(self::PLUGIN);
            $settings->setSecretKey(self::SECRET_KEY);
            $settings->setServerName(self::SERVER_NAME);
            $settings->setSSL(false);
            $settings->setDebug(false);

            self::$instance = $settings;
        }

        return self::$instance;
    }

    /**
     * Set type of authentication.
     * Possible values are 'basic' or 'secret_key'
     * @param $auth
     * @return mixed
     * @throws \Exception
     */
    public function setAuth($auth)
    {
        switch ($auth) {
            case 'basic':
                $auth = self::AUTH_BASE;
                break;
            case 'secret_key':
                $auth = self::AUTH_SECRET_KEY;
                break;
        }

        return $this->set('auth', $auth);
    }

    /**
     * @param $host
     * @return string
     */
    public function setHost($host)
    {
        return $this->set('host', $host);
    }

    /**
     * @param $port
     * @return string
     */
    public function setPort($port)
    {
        return $this->set('port', $port);
    }

    /**
     * @param $plugin
     * @return string
     */
    public function setPlugin($plugin)
    {
        return $this->set('plugin', $plugin);
    }

    /**
     * @param $useSSL
     * @return bool
     */
    public function setSSL($useSSL)
    {
        return $this->set('useSSL', $useSSL);
    }

    /**
     * @param $secretKey
     * @return string
     */
    public function setSecretKey($secretKey)
    {
        return $this->set('secret_key', $secretKey);
    }

    /**
     * @param $user
     * @return string
     */
    public function setUser($user)
    {
        return $this->set('user', $user);
    }

    /**
     * @param $psw
     * @return string
     */
    public function setPsw($psw)
    {
        return $this->set('psw', $psw);
    }

    /**
     * @param $serverName
     * @return string
     */
    public function setServerName($serverName)
    {
        return $this->set('serverName', $serverName);
    }

    /**
     * @param $bool
     * @return string
     */
    public function setDebug($bool)
    {
        return $this->set('debug', $bool);
    }

    /**
     * Return type of authentication.
     * @return string
     */
    public function getAuth()
    {
        return $this->get('auth');
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->get('host');
    }

    /**
     * @return string
     */
    public function getPort()
    {
        return $this->get('port');
    }

    /**
     * @return string
     */
    public function getPlugin()
    {
        return $this->get('plugin');
    }

    /**
     * @return bool
     */
    public function isSSL()
    {
        return $this->get('useSSL');
    }

    /**
     * @return string
     */
    public function getSecretKey()
    {
        return $this->get('secret_key');
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->get('user');
    }

    /**
     * @return string
     */
    public function getPsw()
    {
        return $this->get('psw');
    }

    /**
     * @return string
     */
    public function getServerName()
    {
        return $this->get('serverName');
    }

    /**
     * @return bool
     */
    public function isDebug()
    {
        return $this->get('debug');
    }

    /**
     * Returns the URL under which query the webservice
     * @return string
     */
    public function getBaseURL()
    {
        $base = ($this->isSSL()) ? "https" : "http";
        return $base . "://" . $this->getHost() . ":" . $this->getPort() . $this->getPlugin();
    }

    /**
     * Returns the headers to be sent to web service
     * @return array
     * @throws \Exception
     */
    public function getHeaders()
    {
        switch ($this->getAuth()) {
            case self::AUTH_BASE:
                $auth = "basic " . base64_encode($this->getUser() . ":" . $this->getPsw());
                break;
            case self::AUTH_SECRET_KEY:
                $auth = $this->getSecretKey();
                break;
            default:
                $auth = "Unrecognized auth [{$this->getAuth()}]! Must be 'basic' or 'secret_key'";
                break;
        }

        return array(
            'Accept: application/json',
            'Authorization: ' . $auth,
            'Content-Type: application/json',
        );
    }
}
