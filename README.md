# php-openfire-restapi

[![Latest Stable Version][10]][11] [![Scrutinizer Code Quality][12]][13] [![Total Downloads][14]][15]

A PHP client for the [Openfire][1] [REST API Plugin][2] which provides you the ability
 to manage an Openfire instance by sending a REST/HTTP request to the server.

Please read the [documentation][2] for further information on using this application.

This client completely supports the >= 1.3.9 version of the [REST API Plugin][2].
 
## Dependencies
The REST API plugin need to be installed and configured on your Openfire server.

- [How to install REST API][3]
- [How to configure REST API][4]

## Installation
### Composer
The best way to install php-openfire-restapi is to use Composer, run the following command:

```
composer require gnello/php-openfire-restapi
```

Read more about how to install and use Composer [here][9].

## Usage
### Instance and authentication
There are two ways of authentication:

- Basic HTTP Authentication
```php
use Gnello\OpenFireRestAPI\Client;

$client = new Client([
    'client' => [
        'username' => 'ironman',
        'password' => 'romanoff',
    ]
]);
```
- Shared secret key
```php
use Gnello\OpenFireRestAPI\Client;

$client = new Client([
    'client' => [
        'secretKey' => 'hulkstink',
    ]
]);
```
Make sure to enable one of these authentication methods on your Openfire server.

### Configuration
You can configure the Client with the following options:
```php
use Gnello\OpenFireRestAPI\Client;

$client = new Client([
    'client' => [
        'secretKey' => 'hulkstink',
        'scheme' => 'https',
        'basePath' => '/plugins/restapi/v1/',
        'host' => 'localhost',
        'port' => '9090',
    ],
    'guzzle'    => [
         //put here any options for Guzzle
    ]
]);
```
The only options required are those relating to the chosen authentication method.

### Check the response
This Client follows the [PSR-7][5] document, therefore any response is a ResponseInterface type:
```php
if ($response->getStatusCode() == 200) {
    echo "Oh, great.";
    var_dump(json_decode($response->getBody()));
} else {
    echo "HTTP ERROR " . $response->getStatusCode();
}
```
### Users endpoint
```php
//Create a new user
$response = $client->getUserModel()->createUser([
    "username" => "admin",
    "name" => "Administrator",
    "email" => "admin@example.com",
    "password" => "p4ssword",
    "properties" => [
        [
            "key" => "console.order",
            "value" => "session-summary=0"
        ]
    ]
]);

//Delete a user
$response = $client->getUserModel()->deleteUser('ironman');

//Ban a user
$response = $client->getUserModel()->lockoutUser('ironman');

//Unban a user
$response = $client->getUserModel()->unlockUser('ironman');

//Please read the UserModel class for a complete list of available methods.
```
### Chat Rooms endpoint
```php
//Create a chat room
$response = $client->getChatRoomModel()->createChatRoom([
    "roomName" => "global-1",
    "naturalName" => "global-1_test_hello",
    "description" => "Global chat room",
    "subject" => "Global chat room subject",
    "creationDate" => "2012-10-18T16:55:12.803+02:00",
    "modificationDate" => "2014-07-10T09:49:12.411+02:00",
    "maxUsers" => "0",
    "persistent" => "true",
    "publicRoom" => "true",
    "registrationEnabled" => "false",
    "canAnyoneDiscoverJID" => "true",
    "canOccupantsChangeSubject" => "false",
    "canOccupantsInvite" => "false",
    "canChangeNickname" => "false",
    "logEnabled" => "true",
    "loginRestrictedToNickname" => "true",
    "membersOnly" => "false",
    "moderated" => "false",
    "broadcastPresenceRoles" => [
        "moderator",
        "participant",
        "visitor"
    ],
    "owners" => [
       "owner@localhost"
    ],
    "admins" => [
       "admin@localhost"
    ],
    "members" => [
        "member@localhost"
    ],
    "outcasts" => [
        "outcast@localhost"
    ]
]);

//Retrieve a chat room
$response = $client->getChatRoomModel()->retrieveChatRoom('theavengers')

//Add a user with role to a chat room
use \Gnello\OpenFireRestAPI\Models\ChatRoomModel;
$response = $client->getChatRoomModel()->addUserWithRoleToChatRoom('theavengers', 'ironman', ChatRoomModel::ROLE_MEMBER);

//Delete a chat room
$response = $client->getChatRoomModel()->deleteChatRoom('theavengers');

//Please read the ChatRoomModel class for a complete list of available methods.
```
### Groups endpoint
```php
//Create a group
$response = $client->getGroupModel()->createGroup([
    "name" => "theavengers",
    "description" => "team of superheroes appearing in American comic books published by Marvel Comics",
]);

//Retrieve a group
$response = $client->getGroupModel()->retrieveGroup('theavengers')

//Delete a group
$response = $client->getGroupModel()->deleteGroup('theavengers');

//Please read the GroupModel class for a complete list of available methods.
```

## Endpoints supported  
All the endpoints are supported:
 
- [Users](https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#user-related-rest-endpoints)
- [Chat Rooms](https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#chat-room-related-rest-endpoints)
- [System](https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#system-related-rest-endpoints)
- [Groups](https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#group-related-rest-endpoints)
- [Sessions](https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#session-related-rest-endpoints)
- [Messages](https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#message-related-rest-endpoints)
- [Security Audit](https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#security-audit-related-rest-endpoints)

## Contact
- gnello luca@gnello.com

[1]: http://www.igniterealtime.org/projects/openfire
[2]: https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
[3]: https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#installation
[4]: https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#authentication
[5]: http://www.php-fig.org/psr/psr-7/
[9]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx
[10]: https://poser.pugx.org/gnello/php-openfire-restapi/v/stable
[11]: https://packagist.org/packages/gnello/php-openfire-restapi
[12]: https://scrutinizer-ci.com/g/gnello/php-openfire-restapi/badges/quality-score.png?b=master
[13]: https://scrutinizer-ci.com/g/gnello/php-openfire-restapi/?branch=master
[14]: https://poser.pugx.org/gnello/php-openfire-restapi/downloads
[15]: https://packagist.org/packages/gnello/php-openfire-restapi
