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

namespace Nelcoa\OpenFireRestAPI\Payloads;

/**
 * Payload of SystemProperty related REST Endpoints
 * Class SystemProperty
 * @package OpenFireRestAPI
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#system-property
 */
class SystemProperty extends Payload
{
    /**
     * The name of the system property
     * Optional No
     * @var string
     */
    private $key;

    /**
     * The value of the system property
     * Optional Yes
     * @var string
     */
    private $value;

    /**
     * @param $key
     */
    protected function setKey($key) {
        $this->key = $key;
    }

    /**
     * @param $value
     */
    protected function setValue($value) {
        $this->value = $value;
    }

    /**
     * @return string
     */
    protected function getKey() {
        return $this->key;
    }

    /**
     * @return string
     */
    protected function getValue() {
        return $this->value;
    }
}