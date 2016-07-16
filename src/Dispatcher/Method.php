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

namespace Gnello\OpenFireRestAPI\Dispatcher;

/**
 * HTTP Methods for RESTful Services
 * To provide a standard way of accessing the data the plugin is using REST.
 * Class Method
 * @package Gnello\OpenFireRestAPI\Dispatcher
 */
abstract class Method
{
    /**
     * Receive a read-only data
     */
    const GET       = 'GET';

    /**
     * Overwrite an existing resource
     */
    const POST      = 'POST';

    /**
     * Creates a new resource
     */
    const PUT       = 'PUT';

    /**
     * Deletes the given resource
     */
    const DELETE    = 'DELETE';
}
