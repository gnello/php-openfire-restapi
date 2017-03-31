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

namespace Gnello\OpenFireRestAPI\Payloads;

/**
 * Class Payloads
 * @package Gnello\OpenFireRestAPI\Payloads
 */
abstract class AbstractPayload
{
    /**
     * Payloads constructor.
     */
    public function __construct()
    {
        $args = func_get_args();
        foreach ($args[0] as $k => $v)
        {
            $func = 'set' . ucfirst($k);
            $this->$func($v);
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
            $fnc = 'get' . ucfirst($prop->getName());
            $value = $this->$fnc();
            if (is_null($value)) {
                continue;
            }
            $payload[$prop->getName()] = $value;
        }

        return json_encode($payload);
    }
}