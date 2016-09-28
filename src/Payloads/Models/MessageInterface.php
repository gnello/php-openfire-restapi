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

namespace Gnello\OpenFireRestAPI\Payloads\Models;

/**
 * Payload of Message related REST Endpoint
 * Interface MessageInterface
 * @package Gnello\OpenFireRestAPI\Payloads\Models
 */
interface MessageInterface
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