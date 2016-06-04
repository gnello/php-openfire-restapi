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

namespace Nelcoa\OpenFireRestAPI\Utils;

use \Nelcoa\OpenFireRestAPI\Setting\Setting;

/**
 * Class Utils
 * @package Nelcoa\OpenFireRestAPI\Utils
 */
abstract class Utils
{
    /**
     * Returns the URL under which query the webservice
     * @return string
     */
    public static function getBaseURL()
    {
        $base = (Setting::getSSL()) ? "https" : "http";
        return $base . "://" . Setting::getHost() . ":" . Setting::getPort() . Setting::getPlugin();
    }

    /**
     * Returns the headers to be sent to web service
     * @return array
     */
    public static function getHeaders()
    {
        return array(
            'Accept: application/json',
            'Authorization: ' . Setting::getSecret(),
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
