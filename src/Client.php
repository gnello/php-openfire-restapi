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

namespace Gnello\OpenFireRestAPI;

use Gnello\OpenFireRestAPI\Adapters\GuzzleClientAdapter;
use Gnello\OpenFireRestAPI\Models\ChatRoomModel;
use Gnello\OpenFireRestAPI\Models\GroupModel;
use Gnello\OpenFireRestAPI\Models\MessageModel;
use Gnello\OpenFireRestAPI\Models\SessionModel;
use Gnello\OpenFireRestAPI\Models\SystemModel;
use Gnello\OpenFireRestAPI\Models\UserModel;

/**
 * Class Client
 *
 * @package Gnello\OpenFireRestAPI
 */
class Client
{
    /**
     * Default options of the Client.
     *
     * @var array
     */
    protected $defaultOptions = [
        'scheme' => 'https',
        'basePath' => '/plugins/restapi/v1/',
        'host' => 'localhost',
        'port' => '9090',
        'username' => null,
        'password' => null,
        'secretKey' => null,
    ];

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * Instances of the models.
     *
     * @var array
     */
    private $models = [];

    /**
     * Client constructor.
     *
     * @param array $options
     * @throws \InvalidArgumentException
     */
    public function __construct(array $options)
    {
        $clientOptions = $this->buildClientOptions($options);
        $guzzleOptions = $this->buildGuzzleClientOptions($options);
        $guzzleClient = $this->makeGuzzleClient($clientOptions, $guzzleOptions);

        $guzzleClient->setAuthorizationToken($this->buildAuthorizationToken($clientOptions));

        $this->client = $guzzleClient;
    }

    /**
     * Returns all the options needed by the client.
     *
     * @param array $options
     * @return array
     */
    private function buildClientOptions(array $options)
    {
        $clientOptions = $this->defaultOptions;
        if (isset($options['client'])) {
            $clientOptions = array_merge($clientOptions, $options['client']);
        }

        return $clientOptions;
    }

    /**
     * Returns all the options needed by the Guzzle client.
     *
     * @param array $options
     * @return array
     */
    private function buildGuzzleClientOptions(array $options)
    {
        $guzzleOptions = [];
        if (isset($options['guzzle'])) {
            $guzzleOptions = $options['guzzle'];
        }

        return $guzzleOptions;
    }

    /**
     * Returns the authorization token.
     *
     * @param array $clientOptions
     * @return string
     * @throws \InvalidArgumentException
     */
    private function buildAuthorizationToken(array $clientOptions)
    {
        if (!is_null($clientOptions['secretKey'])) {
            return $clientOptions['secretKey'];
        }

        if (!is_null($clientOptions['username']) && !is_null($clientOptions['password'])) {
            return "basic " . base64_encode($clientOptions['username'] . ":" . $clientOptions['password']);
        }

        throw new \InvalidArgumentException("Unsupported authorization type. 
            You must provide a secretKey or username and password");
    }

    /**
     * Returns an instance of the Guzzle client adapter.
     *
     * @param array $clientOptions
     * @param array $guzzleOptions
     * @return GuzzleClientAdapter
     */
    private function makeGuzzleClient(array $clientOptions, array $guzzleOptions)
    {
        if (!isset($guzzleOptions['base_uri'])) {
            $guzzleOptions['base_uri'] = $clientOptions['scheme'] . '://' . $clientOptions['host'] .
                ':' . $clientOptions['port'] . $clientOptions['basePath'];
        }

        return new GuzzleClientAdapter($guzzleOptions);
    }

    /**
     * Returns the Model needed.
     *
     * @param $className
     * @return mixed
     */
    protected function getModel($className)
    {
        if (!isset($this->models[$className])) {
            $this->models[$className] = new $className($this->client);
        }

        return $this->models[$className];
    }

    /**
     * @return UserModel
     */
    public function getUserModel()
    {
        return $this->getModel(UserModel::class);
    }

    /**
     * @return ChatRoomModel
     */
    public function getChatRoomModel()
    {
        return $this->getModel(ChatRoomModel::class);
    }

    /**
     * @return SystemModel
     */
    public function getSystemModel()
    {
        return $this->getModel(SystemModel::class);
    }

    /**
     * @return GroupModel
     */
    public function getGroupModel()
    {
        return $this->getModel(GroupModel::class);
    }

    /**
     * @return SessionModel
     */
    public function getSessionModel()
    {
        return $this->getModel(SessionModel::class);
    }

    /**
     * @return MessageModel
     */
    public function getMessageModel()
    {
        return $this->getModel(MessageModel::class);
    }

}