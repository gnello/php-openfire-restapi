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

namespace Nelcoa\OpenFireRestAPI\Payload;

use Nelcoa\OpenFireRestAPI\Payload\Model\SystemPropertyInterface;

/**
 * Payload of SystemProperty related REST Endpoint
 * Class SystemProperty
 * @package Nelcoa\OpenFireRestAPI\Payload
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#system-property
 */
class SystemProperty extends AbstractPayload implements SystemPropertyInterface
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
    public function setKey($key) {
        $this->key = $key;
    }

    /**
     * @param $value
     */
    public function setValue($value) {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getKey() {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getValue() {
        return $this->value;
    }
}