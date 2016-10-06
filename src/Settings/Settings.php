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

use Gnello\OpenFireRestAPI\AuthenticationToken;
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
    const PLUGIN_PATH   = '/plugins/restapi/v1';

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
            $settings->setPlugin(self::PLUGIN_PATH);
            $settings->setSSL(false);
            $settings->setDebug(false);

            self::$instance = $settings;
        }

        return self::$instance;
    }

    /**
     * Destroy instance
     */
    public function destroy()
    {
        self::$instance = null;
    }

    /**
     * @param $host
     * @return string
     */
    public function setHost($host)
    {
        if (!is_string($host)) {
            return false;
        }

        $parsed_host = parse_url($host, PHP_URL_HOST);

        if (is_null($parsed_host)) {
            $parsed_host = $host;
        } else {
            $scheme = parse_url($host, PHP_URL_SCHEME);
            $this->setSSL($scheme === 'https');
        }

        return $this->set('host', $parsed_host);
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
     * @param $serverName
     * @return string
     */
    public function setServerName($serverName)
    {
        return $this->set('serverName', $serverName);
    }

    /**
     * @param $host
     * @return string
     */
    public function setServerNameFromHost($host)
    {
        if (!is_string($host)) {
            return false;
        }

        $parsed_host = parse_url($host, PHP_URL_HOST);

        if (is_null($parsed_host)) {
            $serverName = $host;
        } else {
            $serverName = preg_replace('/^www\./', '', $parsed_host);
        }

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
     * @param AuthenticationToken $authenticationToken
     * @return mixed
     */
    public function setAuthenticationToken(AuthenticationToken $authenticationToken)
    {
        return $this->set('authenticationToken', $authenticationToken);
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
     * @return AuthenticationToken
     */
    public function getAuthenticationToken()
    {
        return $this->get('authenticationToken');
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
        $authToken = $this->getAuthenticationToken()->getAuthToken();

        if (empty($authToken)) {
            $authToken = "Unrecognized authentication token!";
        }

        return array(
            'Accept: application/json',
            'Authorization: ' . $authToken,
            'Content-Type: application/json',
        );
    }
}
