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
 * Payload of SystemProperty related REST Endpoint
 * Class SystemPropertyPayload
 * @package Gnello\OpenFireRestAPI\Payloads
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#system-property
 */
class SystemPropertyPayload extends AbstractPayload
{
    /**
     * The name of the system property
     * Optional No
     * @var string
     */
    //private $key;

    /**
     * The value of the system property
     * Optional Yes
     * @var string
     */
    //private $value;

    /**
     * The value of the system property
     * Optional Yes
     * @var string
     */
    private $property;

    /**
     * SystemPropertyPayload constructor.
     * @param $property
     */
    public function __construct($property)
    {
        $prop['property'][$property['propertyName']] = $property['propertyValue'];
        parent::__construct($prop);
    }

    /**
     * @param array $properties
     */
    public function setProperty(array $properties) {
        foreach ($properties as $key => $value) {
            $property['@key'] = $key;
            $property['@value'] = $value;
            $this->property = $property;
        }
    }

    /**
     * @return array
     */
    public function getProperty() {
        return $this->property;
    }
}