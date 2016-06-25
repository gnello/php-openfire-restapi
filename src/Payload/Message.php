<?php
/**
 * OpenFireRestAPI is based entirely on official documentation of the REST API
 * Plugin and you can extend it by following the directives of the documentation
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/gnello/PHPOpenFireRestAPI/contributors
 *
 * @author Luca Agnello <lcagnello@gmail.com>
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */

namespace Gnello\OpenFireRestAPI\Payload;

use Gnello\OpenFireRestAPI\Payload\Model\MessageInterface;

/**
 * Payload of Message related REST Endpoint
 * Class Message
 * @package Gnello\OpenFireRestAPI\Payload
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