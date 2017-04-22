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

namespace Gnello\OpenFireRestAPI\Settings;

/**
 * Class SettingsTest
 * @package Gnello\OpenFireRestAPI\Settings
 */
class SettingsTest extends \PHPUnit_Framework_TestCase
{
    /** @var Settings */
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = Settings::getInstance();
    }

    protected function tearDown()
    {
        $this->fixture->destroy();
    }

    public function testGetInstance()
    {
        $this->assertInstanceOf("Gnello\\OpenFireRestAPI\\Settings\\Settings", $this->fixture);
    }

    public function testGetInstanceIsCorrectlyInitializated()
    {
        $this->assertEquals(Settings::PLUGIN_PATH, $this->fixture->getPlugin());
        $this->assertFalse($this->fixture->isSSL());
        $this->assertFalse($this->fixture->isDebug());
    }

    public function testSetHost()
    {
        $this->fixture->setHost('http://www.example.it');
        $this->assertEquals('www.example.it', $this->fixture->getHost());

        $this->fixture->setHost('test');
        $this->assertEquals('test', $this->fixture->getHost());
    }

    public function testHostIsNull()
    {
        $this->fixture->setHost(true);
        $this->assertNull($this->fixture->getHost());

        $this->fixture->setHost(1);
        $this->assertNull($this->fixture->getHost());

        $this->fixture->setHost(array(1, 2));
        $this->assertNull($this->fixture->getHost());
    }

    public function testSetServerNameFromHost()
    {
        $this->fixture->setServerNameFromHost('http://www.example.it');
        $this->assertEquals('example.it', $this->fixture->getServerName());

        $this->fixture->setServerNameFromHost('test');
        $this->assertEquals('test', $this->fixture->getServerName());
    }
 
    public function testServerNameFromHostIsNull()
    {
        $this->fixture->setServerNameFromHost(true);
        $this->assertNull($this->fixture->getServerName());

        $this->fixture->setServerNameFromHost(1);
        $this->assertNull($this->fixture->getServerName());

        $this->fixture->setServerNameFromHost(array(1, 2));
        $this->assertNull($this->fixture->getServerName());
    }
}
