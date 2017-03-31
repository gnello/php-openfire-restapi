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

/**
 * Class APITest
 * @package Gnello\OpenFireRestAPI
 */
class APITest extends \PHPUnit_Framework_TestCase
{
    /** @var AuthenticationToken */
    protected $authenticationToken;

    /** @var API */
    protected $api;

    protected function setUp()
    {
        $this->authenticationToken = new AuthenticationToken('shared_secret_key');
        $this->api = new API('http://host', 9090, $this->authenticationToken);
    }

    protected function tearDown()
    {
        $this->api = null;
    }

    public function testAPISettings()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Settings\\Settings", $this->api->Settings());
    }

    public function testAPISettingsGetHost()
    {
        $this->assertEquals("host", $this->api->Settings()->getHost());
    }

    public function testAPISettingsGetPort()
    {
        $this->assertEquals(9090, $this->api->Settings()->getPort());
    }

    public function testAPISettingsGetServerName()
    {
        $this->assertEquals("host", $this->api->Settings()->getServerName());
    }

    public function testAPIisSSL()
    {
        $api = new API('https://host', 9090, $this->authenticationToken);
        $this->assertTrue($api->Settings()->isSSL());
    }

    public function testAPIisSSLNot()
    {
        $api = new API('http://host', 9090, $this->authenticationToken);
        $this->assertFalse($api->Settings()->isSSL());
    }

    public function testAPIUsers()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Endpoints\\UserEndpoint", $this->api->Users());
    }

    public function testAPIChatRooms()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Endpoints\\ChatRoomEndpoint", $this->api->ChatRooms());
    }

    public function testAPIGroups()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Endpoints\\GroupEndpoint", $this->api->Groups());
    }

    public function testAPIMessages()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Endpoints\\MessageEndpoint", $this->api->Messages());
    }

    public function testAPISessions()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Endpoints\\SessionEndpoint", $this->api->Sessions());
    }

    public function testAPISystem()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Endpoints\\SystemEndpoint", $this->api->System());
    }

    public function testAPIPayloads()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Payloads\\Payload", $this->api->Payloads());
    }

    public function testAPIDebugger()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Utils\\Debugger", $this->api->Debugger());
    }
}