# php-openfire-restapi

[![Build Status][8]][7]

Easy Php REST API Client for the [Openfire][1] [REST API Plugin][2] which provides the ability to manage Openfire instance by sending an REST/HTTP request to the server 

[Documentation (under construction)][5]

## Version
The current version is 1.2.3, see [CHANGELOG][6] for further information

## License
PhpOpenFireRestAPI is licensed under Apache License 2.0, see LICENCE for further information.

## Requirements
- PHP 5.3+

## Dependencies
The REST API plugin need to be installed and configured on the Openfire server.

* [How to install REST API][3]
* [How to configure REST API][4]

## Installation
### Composer
The best way to install php-openfire-restapi is to use Composer, you do that:

1) Add the following to your project's ```composer.json``` file:
```json
{
    "require": {
        "gnello/php-openfire-restapi": "dev-master"
    }
}
```

2) Run ```composer install``` or ```composer update``` command

Read more about how to install and use Composer on your local machine [here][9].

## Configuration
Just change these constants into src/Settings/Settings.php (not recommended if you're using composer)
```php
const HOST = 'your_host';
const PORT = '9090';
const PLUGIN = '/plugins/restapi/v1';
const SERVER_NAME = 'your_server_name';
```

or you can dynamically configure it in this way
```php
include "vendor/autoload.php";

//Set the required config parameters
$api->Settings()->setHost("your_host");
$api->Settings()->setServerName("your_servername");

//Default values
$api->Settings()->setPort("9090");
$api->Settings()->setSSL(false);
$api->Settings()->setPlugin("/plugins/restapi/v1");
```
## Authentication
There are two ways to authenticate:

Basic HTTP Authentication
```php
//Set the required authentication parameters
$api->Settings()->setAuth("basic");
$api->Settings()->setUser("your_user");
$api->Settings()->setPsw("your_password");
```
Shared secret key
```php
//Set the required authentication parameters
$api->Settings()->setAuth("secret_key"); //is setted by default so it's optional
$api->Settings()->setSecretKey("your_secret_key");
```
## Usage
### Start
```php
include "vendor/autoload.php";

$api = new \Gnello\OpenFireRestAPI\API();
```
### Check result
```php
if($result['response']) {
    echo $result['output'];
} else {
    echo 'Error!';
}
```
### Users
```php
//Add a new user
$properties = array('key1' => 'value1', 'key2' => 'value2');
$result = $api->Users()->createUser('Username', 'Password', 'Full Name', 'email@domain.com', $properties);

//Delete a user
$result = $api->Users()->deleteUser('Username');

//Ban a user
$result = $api->Users()->lockoutUser('Username');

//Unban a user
$result = $api->Users()->unlockUser('Username');
```
### Rosters
```php
//Add to roster
use \Gnello\OpenFireRestAPI\Settings\SubscriptionType;
$result = $api->Users()->createUserRosterEntry('Username', 'Jid', 'Full Name', SubscriptionType::BOTH, array('group1','group2'));

//Update roster
use \Gnello\OpenFireRestAPI\Settings\SubscriptionType;
$result = $api->Users()->updateUserRosterEntry('Username', 'Jid', 'Full Name', SubscriptionType::BOTH, array('group1'));

//Delete from roster
$result = $api->Users()->deleteUserRosterEntry('Username', 'Jid');
```
### Groups
```php
//Create group
$result = $api->Groups()->createGroup('groupname', 'description');

//Add to Groups
$result = $api->Users()->addUserToGroups('Username', array('groupname1', 'groupname2', 'groupname3'));

//Delete from Groups
$result = $api->Users()->deleteUserFromGroups('Username', array('groupname1','groupname2'));
```
### Messages
```php
//Send message to all online users
$result = $api->Messages()->sendBroadcastMessage('Hello everybody!');
```
### ChatRooms
```php
//Create a new ChatRoom
$payload = $api->Payloads()->createChatRoomPayload();
$payload->setRoomName('myfirstchatroom');
$payload->setNaturalName('my_first_chat_room');
$payload->setDescription('This is my first chat room!');
$result = $api->ChatRooms()->createChatRoom($payload);

//Add user with role to chat room
$result = $api->ChatRooms()->addUserWithRoleToChatRoom('myfirstchatroom','members','username');

//Add group with role to chat room
$result = $api->ChatRooms()->addGroupWithRoleToChatRoom('myfirstchatroom','outcasts','groupname');

//Delete a user from a chat room
$result = $api->ChatRooms()->deleteUserFromChatRoom('myfirstchatroom','members','username');

//Delete a chat room
$result = $api->ChatRooms()->deleteChatRoom('myfirstchatroom');
```
## Debug
Under development you may need access to some useful information of the execution of software they're not normally available. 
To do this just enable debug mode like this
```php
//Enable debug mode
$api->Settings()->setDebug(true);
```
At the moment it's available the register of requests (with its server responses) and the curl info. You can access it in this way
```php
$requests = $api->Debugger()->getRequests();
$curlInfo = $api->Debugger()->getCurlInfo();
```

## Contact
- gnello luca@gnello.com

[1]: http://www.igniterealtime.org/projects/openfire
[2]: https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html
[3]: https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#installation
[4]: https://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#authentication
[5]: https://github.com/gnello/php-openfire-restapi/wiki
[6]: https://github.com/gnello/php-openfire-restapi/blob/master/CHANGELOG.md
[7]: https://scrutinizer-ci.com/g/gnello/php-openfire-restapi/build-status/master
[8]: https://scrutinizer-ci.com/g/gnello/php-openfire-restapi/badges/build.png?b=master
[9]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx