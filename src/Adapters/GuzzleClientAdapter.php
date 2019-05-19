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

namespace Gnello\OpenFireRestAPI\Adapters;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * Class GuzzleClientAdapter
 *
 * @package Gnello\OpenFireRestAPI
 */
class GuzzleClientAdapter
{
    /**
     * The headers of the request.
     *
     * @var array
     */
    private $headers = [
        'Accept' => 'application/json',
    ];

    /**
     * @var GuzzleClient
     */
    private $client;

    /**
     * GuzzleClientAdapter constructor.
     *
     * @param array $guzzleOptions
     */
    public function __construct(array $guzzleOptions = [])
    {
        $this->client = new GuzzleClient($guzzleOptions);
    }

    /**
     * Sets the authorization header.
     *
     * @param $token
     */
    public function setAuthorizationToken($token)
    {
        $this->headers['Authorization'] = $token;
    }

    /**
     * Builds the options for the request.
     *
     * @param $options
     * @param $type
     * @return array
     */
    private function buildOptions($options, $type)
    {
        return [
            RequestOptions::HEADERS => $this->headers,
            $type => $options,
        ];
    }

    /**
     * Makes the request.
     *
     * @param       $method
     * @param       $uri
     * @param       $type
     * @param array $options
     * @return ResponseInterface
     */
    private function dispatch($method, $uri, $type, array $options = [])
    {
        try {
            $response = $this->client->{$method}($uri, $this->buildOptions($options, $type));
        } catch (RequestException $e) {
            $response = $e->getResponse();
        }

        return $response;
    }

    /**
     * @param        $uri
     * @param array  $options
     * @param string $type
     * @return ResponseInterface
     */
    public function get($uri, array $options = [], $type = RequestOptions::QUERY)
    {
        return $this->dispatch('get', $uri, $type, $options);
    }

    /**
     * @param        $uri
     * @param array  $options
     * @param string $type
     * @return ResponseInterface
     */
    public function post($uri, $options = [], $type = RequestOptions::JSON)
    {
        return $this->dispatch('post', $uri, $type, $options);
    }

    /**
     * @param        $uri
     * @param array  $options
     * @param string $type
     * @return ResponseInterface
     */
    public function put($uri, $options = [], $type = RequestOptions::JSON)
    {
        return $this->dispatch('put', $uri, $type, $options);
    }

    /**
     * @param        $uri
     * @param array  $options
     * @param string $type
     * @return ResponseInterface
     */
    public function delete($uri, $options = [], $type = RequestOptions::JSON)
    {
        return $this->dispatch('delete', $uri, $type, $options);
    }
}
