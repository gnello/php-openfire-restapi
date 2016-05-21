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

namespace Nelcoa\OpenFireRestAPI\Settings;

class Settings
{
    /**
     * Default Settings
     * Edit this section to configure your client
     */
    const HOST = 'your_host';
    const PORT = '9090';
    const PLUGIN = '/plugins/restapi/v1';
    const SECRET = 'your_secret';
    const SERVER_NAME = 'your_server_name';

    private static $host	    = self::HOST;
    private static $port	    = self::PORT;
    private static $plugin      = self::PLUGIN;
    private static $secret	    = self::SECRET;
    private static $serverName	= self::SERVER_NAME;
    private static $useSSL	    = false;

    /**
     * @param $host
     */
    public static function setHost($host)
    {
        self::$host = $host;    
    }

    /**
     * @param $port
     */
    public static function setPort($port)
    {
        self::$port = $port;    
    }

    /**
     * @param $plugin
     */
    public static function setPlugin($plugin)
    {
        self::$plugin = $plugin;    
    }

    /**
     * @param bool $useSSL
     */
    public static function setSSL($useSSL)
    {
        self::$useSSL = $useSSL;
    }

    /**
     * @param $secret
     */
    public static function setSecret($secret)
    {
        self::$secret = $secret;    
    }

    /**
     * @param $serverName
     */
    public static function setServerName($serverName)
    {
        self::$serverName = $serverName;
    }
    
    /**
     * Returns the URL under which query the webservice
     * @return string
     */
    public static function getBaseURL()
    {
        $base = (self::$useSSL) ? "https" : "http";
        return $base . "://" . self::$host . ":" . self::$port . self::$plugin;
    }

    /**
     * Returns the headers to be sent to web service
     * @return array
     */
    public static function getHeaders()
    {
        return array(
            'Accept: application/json',
            'Authorization: ' . self::$secret,
            'Content-Type: application/json',
        );
    }

    /**
     * Returns always the correct jid
     * @param $jid
     * @return string
     */
    public static function getJID($jid)
    {
        if (strpos('@' . self::$serverName, $jid) === false) {
            $jid .= '@' . self::$serverName;
        }
        return $jid;
    }
}
