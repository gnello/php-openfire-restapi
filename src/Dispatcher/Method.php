<?php
/**
 * OpenFireRestAPI is based entirely on official documentation of the REST API
 * Plugin and you can extend it by following the directives of the documentation
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/nelcoa/PHPOpenFireRestAPI/contributors
 *
 * @author Luca Agnello <lcagnello@gmail.com>
 * @link https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
 */

namespace Nelcoa\OpenFireRestAPI\Dispatcher;

/**
 * HTTP Methods for RESTful Services
 * To provide a standard way of accessing the data the plugin is using REST.
 * Class Method
 * @package Nelcoa\OpenFireRestAPI\Dispatcher
 */
abstract class Method
{
    /**
     * GET	    Receive a read-only data
     * PUT	    Overwrite an existing resource
     * POST	    Creates a new resource
     * DELETE   Deletes the given resource
     */
    const GET       = 'GET';
    const POST      = 'POST';
    const PUT       = 'PUT';
    const DELETE    = 'DELETE';
}
