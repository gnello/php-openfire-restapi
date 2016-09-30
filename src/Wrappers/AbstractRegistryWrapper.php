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

namespace Gnello\OpenFireRestAPI\Wrappers;

/**
 * Class AbstractRegistryWrapper
 * @package Gnello\OpenFireRestAPI\Settings
 */
class AbstractRegistryWrapper
{
    /**
     * @var array
     */
    private $register = array();

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    protected function set($key, $value)
    {
        if (is_array($key)) {
            return $this->register[$key[0]][] = $value;
        }

        return $this->register[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    protected function get($key)
    {
        if (!isset($this->register[$key])) {
            return null;
        }

        return $this->register[$key];
    }
}
