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

use Gnello\OpenFireRestAPI\Settings\SubscriptionType;

/**
 * Class SubscriptionTypeTest
 * @package Gnello\OpenFireRestAPI
 */
class SubscriptionTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testIsValid()
    {
        $this->assertTrue(SubscriptionType::isValid(0));
        $this->assertTrue(SubscriptionType::isValid(1));
        $this->assertTrue(SubscriptionType::isValid(2));
        $this->assertTrue(SubscriptionType::isValid(3));
    }

    public function testIsNotValid()
    {
        $this->assertFalse(SubscriptionType::isValid(4));
        $this->assertFalse(SubscriptionType::isValid(-1));
        $this->assertFalse(SubscriptionType::isValid('test'));
        $this->assertFalse(SubscriptionType::isValid(array(1,2)));
        $this->assertFalse(SubscriptionType::isValid(true));
    }
}