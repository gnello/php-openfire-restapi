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

namespace Nelcoa\OpenFireRestAPI\Payload\Model;

/**
 * Payload of Message related REST Endpoint
 * Interface IMessage
 * @package Nelcoa\OpenFireRestAPI\Payload\Model
 */
interface IMessage
{
    /**
     * @param $body
     */
    public function setBody($body);

    /**
     * @return string
     */
    public function getBody();
}