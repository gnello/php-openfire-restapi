# php-openfire-restapi
Easy Php REST API Client to manage [Openfire Server] (http://www.igniterealtime.org/projects/openfire/)

## VERSION
current version: 1.2.1

##### CHANGELOG

- v1.2.2 ()
-- Added Basic Authentication
-- Added Debugger Class
-- Renamed method "setSecret" to "setSecretKey"

- v1.2.1 (30/09/2016)
-- Fixed a bug of the "setJid" method into RosterItem Payload
-- Renamed some classes (never satisfied :P)

- v1.2.0 (29/09/2016)
-- Added debug mode
-- Improved logic of Settings  

- v1.1.0 (16/07/2016)
-- Renamed some methods into API class

- v1.0.4 (21/05/2016)
-- first release

## LICENSE
PhpOpenFireRestAPI is licensed under Apache License 2.0, see LICENCE for further information.

## REQUIREMENTS
- PHP 5.3+

## INSTALLATION
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

Read more about how to install and use Composer on your local machine [here] (https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

## CONFIGURATION
Just change these constants into src/Settings/Settings.php
```php
const HOST = 'your_host';
const PORT = '9090';
const PLUGIN = '/plugins/restapi/v1';
const SERVER_NAME = 'your_server_name';
```

or you can dynamically configure it at any point of the project in this way
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
## AUTHENTICATION
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
## USAGE
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
$result = $api->Users()->addUserToGroup('Username', array('groupname1', 'groupname2', 'groupname3'));

//Delete from Groups
$result = $api->Users()->deleteUserFromGroup('Username', array('groupname1','groupname2'));
```
### Messages
```php
//Send message to all online users
$result = $api->Messages()->sendBroadcastMessage('Hello everybody!');
```
### ChatRooms
```php
//Create a new ChatRoom
$payload = new \Gnello\OpenFireRestAPI\Payloads\ChatRoom();
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
## DEBUG
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

## CONTACT
- gnello luca@gnello.com
