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

namespace Gnello\OpenFireRestAPI\Utils;

use \Gnello\OpenFireRestAPI\Settings\Settings;

/**
 * Class Utils
 * @package Gnello\OpenFireRestAPI\Utils
 */
abstract class Utils
{
    /**
     * Returns the URL under which query the webservice
     * @return string
     */
    public static function getBaseURL()
    {
        $settings = Settings::getInstance();
        $base = ($settings->isSSL()) ? "https" : "http";
        return $base . "://" . $settings->getHost() . ":" . $settings->getPort() . $settings->getPlugin();
    }

    /**
     * Returns the headers to be sent to web service
     * @return array
     */
    public static function getHeaders()
    {
        $settings = Settings::getInstance();
        return array(
            'Accept: application/json',
            'Authorization: ' . $settings->getSecret(),
            'Content-Type: application/json',
        );
    }

    /**
     * @param $item
     * @return array
     */
    public static function toArray($item) {
        if (!is_array($item)) {
            $item = array($item);
        }

        return $item;
    }
}
