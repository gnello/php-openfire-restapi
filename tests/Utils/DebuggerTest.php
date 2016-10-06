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

namespace Gnello\OpenFireRestAPI;

use Gnello\OpenFireRestAPI\Utils\Debugger;

/**
 * Class DebuggerTest
 * @package Gnello\OpenFireRestAPI
 */
class DebuggerTest extends \PHPUnit_Framework_TestCase
{
    /** @var Debugger */
    protected $debugger;

    protected function setUp()
    {
        $this->debugger = Debugger::getInstance();
    }

    protected function tearDown()
    {
        unset($this->debugger);
    }

    public function testGetInstance()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Utils\\Debugger", $this->debugger);
    }

    public function testRecordRequest()
    {
        $this->debugger->recordRequest('url', 'headers', 'method', 'postData', 'response', 'server_output');
        $expected = json_encode(array(array('url' => 'url', 'headers' => 'headers', 'method' => 'method', 'postData' => 'postData', 'response' => 'response', 'server_output' => 'server_output')));
        $this->assertEquals($expected, json_encode($this->debugger->getRequests()));
    }

    public function testRecordCurlInfo()
    {
        $this->debugger->recordCurlInfo('test_curl');
        $this->assertEquals('test_curl', $this->debugger->getCurlInfo());
    }
}