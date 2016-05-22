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
 * Payload of SystemProperty related REST Endpoint
 * Interface ISystemProperty
 * @package Nelcoa\OpenFireRestAPI\Payload\Model
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#system-property
 */
interface ISystemProperty
{
    /**
     * @param $key
     */
    public function setKey($key);

    /**
     * @param $value
     */
    public function setValue($value);

    /**
     * @return string
     */
    public function getKey();

    /**
     * @return string
     */
    public function getValue();
}