<?php

/**
 * OpenFireRestAPI is based entirely on the official documentation of the REST API
 * Plugin and you can extend it by following the directives of the documentation
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/gnello/PHPOpenFireRestAPI/contributors
 *
 * Ask, and it shall be given you; seek, and you shall find.
 *
 * @author Luca Agnello <luca@gnello.com>
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */

namespace Gnello\OpenFireRestAPI\Tests;

use Gnello\OpenFireRestAPI\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest
 *
 * @package Gnello\OpenFireRestAPI\Tests
 */
class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function that_exception_is_thrown_if_no_secret_key_or_username_and_password_are_provided_to_the_client()
    {
        $this->expectException(\InvalidArgumentException::class);

        $client = new Client([]);
    }

    /**
     * @test
     */
    public function that_we_can_instantiate_the_client_with_a_secret_key()
    {
        $client = new Client(['client' => ['secretKey' => '1234']]);

        $this->assertInstanceOf(Client::class, $client);
    }

    /**
     * @test
     */
    public function that_we_can_instantiate_the_client_with_username_and_password()
    {
        $client = new Client(['client' => ['username' => 'admin', 'password' => '1234']]);

        $this->assertInstanceOf(Client::class, $client);
    }
}