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

abstract class Payload 
{
    /**
     * Payload constructor.
     */
    public function __construct()
    {
        $args = func_get_args();
        foreach ($args as $k => $v)
        {
            $this->{$k} = $v;
        }
    }

    /**
     * @return string
     */
    public function prepare()
    {
        $reflect = new \ReflectionClass($this);
        $props   = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);

        $payload = array();
        foreach ($props as $prop) {
            $payload[$prop->getName()] = $prop->getValue();
        }

        return json_encode($payload);
    }
}