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

use Gnello\OpenFireRestAPI\Payloads\Models\MessageInterface;

/**
 * Payload of Message related REST Endpoint
 * Class Message
 * @package Gnello\OpenFireRestAPI\Payloads
 */
class Message extends AbstractPayload implements MessageInterface
{
    /**
     * The body of the message
     * Optional No
     * @var string
     */
    private $body;

    /**
     * @param $body
     */
    public function setBody($body) {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
    }
}