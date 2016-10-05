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
 * Class AuthenticationTokenTest
 * @package Gnello\OpenFireRestAPI
 */
class AuthenticationTokenTest extends \PHPUnit_Framework_TestCase
{
    public function testAuthenticationTokenGetAuthModeBase()
    {
        $fixture = new AuthenticationToken('username', 'password');
        $this->assertEquals(AuthenticationToken::AUTH_BASE, $fixture->getAuthMode());
    }

    public function testAuthenticationTokenGetAuthModeSharedSecretKey()
    {
        $fixture = new AuthenticationToken('shared_secret_key');
        $this->assertEquals(AuthenticationToken::AUTH_SECRET_KEY, $fixture->getAuthMode());
    }

    public function testAuthenticationTokenGetAuthModeNotBase()
    {
        $fixture = new AuthenticationToken('username', 'password', 'shared_secret_key');
        $this->assertNotEquals(AuthenticationToken::AUTH_BASE, $fixture->getAuthMode());
    }

    public function testAuthenticationTokenGetAuthModeNotSharedSecretKey()
    {
        $fixture = new AuthenticationToken('username', 'password', 'shared_secret_key');
        $this->assertNotEquals(AuthenticationToken::AUTH_SECRET_KEY, $fixture->getAuthMode());
    }

    public function testAuthenticationTokenGetAuthTokenBase()
    {
        $fixture = new AuthenticationToken('username', 'password');
        $this->assertEquals("basic " . base64_encode("username:password"), $fixture->getAuthToken());
    }

    public function testAuthenticationTokenGetAuthTokenSharedSecretKey()
    {
        $fixture = new AuthenticationToken('shared_secret_key');
        $this->assertEquals('shared_secret_key', $fixture->getAuthToken());
    }

    public function testAuthenticationTokenGetAuthTokenNull()
    {
        $fixture = new AuthenticationToken('username', 'password', 'shared_secret_key');
        $this->assertNull($fixture->getAuthToken());
    }

    public function testAuthenticationTokenGetSharedSecretKey()
    {
        $fixture = new AuthenticationToken('shared_secret_key');
        $this->assertEquals('shared_secret_key', $fixture->getSharedSecretKey());
    }

    public function testAuthenticationTokenGetUsername()
    {
        $fixture = new AuthenticationToken('username', 'password');
        $this->assertEquals('username', $fixture->getUsername());
    }

    public function testAuthenticationTokenGetPassword()
    {
        $fixture = new AuthenticationToken('username', 'password');
        $this->assertEquals('password', $fixture->getPassword());
    }
}