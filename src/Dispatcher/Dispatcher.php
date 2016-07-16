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

namespace Gnello\OpenFireRestAPI\Dispatcher;

use \Gnello\OpenFireRestAPI\Payloads\AbstractPayload;
use \Gnello\OpenFireRestAPI\Utils\Utils;

/**
 * This class is responsible for sending requests to the server. The requests are sent
 * by curl to ensure compatibility also with PHP installations without the XML form.
 *
 * Class Dispatcher
 * @package Gnello\OpenFireRestAPI\Dispatcher
 */
abstract class Dispatcher
{
    /**
     * @param $method
     * @param $endpoint
     * @param AbstractPayload $payload
     * @return array
     */
    protected static function sendRequest($method, $endpoint, AbstractPayload $payload = null)
    {
        $url = Utils::getBaseURL() . $endpoint;
        $headers = Utils::getHeaders();

        $postData = null;
        if (!is_null($payload)) {
            $postData = $payload->prepare();
        }

        return self::execute_curl($url, $headers, $method, $postData);
    }

    /**
     * @param $url
     * @param $headers
     * @param $method
     * @param $postData
     * @return bool|mixed
     */
    private static function execute_curl($url, $headers, $method, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_URL, $url);

        if (!empty($postData)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }

        $server_output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close ($ch);

        $response = false;
        if ($info['http_code'] == 200 || $info['http_code'] == 201) {
            $response = true;
        }

        return array(
            'response'  => $response,
            'output'    => json_decode($server_output)
        );
    }
}