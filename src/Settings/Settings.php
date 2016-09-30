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
    const HOST = 'localhost';
    const PORT = '9090';
    const PLUGIN = '/plugins/restapi/v1';
    const SECRET = 'your_secret';
    const SERVER_NAME = 'your_server_name';

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
            $settings->setHost(self::HOST);
            $settings->setPort(self::PORT);
            $settings->setPlugin(self::PLUGIN);
            $settings->setSecret(self::SECRET);
            $settings->setServerName(self::SERVER_NAME);
            $settings->setSSL(false);
            $settings->setDebug(false);

            self::$instance = $settings;
        }

        return self::$instance;
    }

    /**
     * @param $host
     * @return mixed
     */
    public function setHost($host)
    {
        return $this->set('host', $host);
    }

    /**
     * @param $port
     * @return mixed
     */
    public function setPort($port)
    {
        return $this->set('port', $port);
    }

    /**
     * @param $plugin
     * @return mixed
     */
    public function setPlugin($plugin)
    {
        return $this->set('plugin', $plugin);
    }

    /**
     * @param $useSSL
     * @return mixed
     */
    public function setSSL($useSSL)
    {
        return $this->set('useSSL', $useSSL);
    }

    /**
     * @param $secret
     * @return mixed
     */
    public function setSecret($secret)
    {
        return $this->set('secret', $secret);
    }

    /**
     * @param $serverName
     * @return mixed
     */
    public function setServerName($serverName)
    {
        return $this->set('serverName', $serverName);
    }

    /**
     * @param $bool
     * @return mixed
     */
    public function setDebug($bool)
    {
        return $this->set('debug', $bool);
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
    public function getSecret()
    {
        return $this->get('secret');
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
     */
    public function getHeaders()
    {
        return array(
            'Accept: application/json',
            'Authorization: ' . $this->getSecret(),
            'Content-Type: application/json',
        );
    }
}
