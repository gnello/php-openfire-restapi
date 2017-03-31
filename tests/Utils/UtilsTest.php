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

use Gnello\OpenFireRestAPI\Utils\Utils;

/**
 * Class UtilsTest
 * @package Gnello\OpenFireRestAPI
 */
class UtilsTest extends \PHPUnit_Framework_TestCase
{
    public function testToArray()
    {
        $this->assertEquals(array('ciao'), Utils::toArray('ciao'));
    }

    public function testToArrayIfArray()
    {
        $this->assertEquals(array('ciao'), Utils::toArray(array('ciao')));
    }
}