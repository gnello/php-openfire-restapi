# php-openfire-restapi
Easy Php REST API Client to manage Openfire Server

## VERSION
1.0.4

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
        "nelcoa/php-openfire-restapi": "dev-master"
    }
}
```

2) Run ```composer install``` or ```composer update``` command

Read more about how to install and use Composer on your local machine [here] (https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx).

## CONFIGURATION
Just change these constants into Setting.php
```php
const HOST = 'your_host';
const PORT = '9090';
const PLUGIN = '/plugins/restapi/v1';
const SECRET = 'your_secret';
const SERVER_NAME = 'your_server_name';
```

or you can dynamically configure in this way
```php
include "vendor/autoload.php";

$api = new \Nelcoa\OpenFireRestAPI\API();

// Set the required config parameters
$api->Setting()->setSecret("your_secret");
$api->Setting()->setHost("your_host");
$api->Setting()->setServerName("your_servername");

//Default values
$api->Setting()->setPort("9090");
$api->Setting()->setSSL(false);
$api->Setting()->setPlugin("/plugins/restapi/v1");
```

## USAGE
### Start
```php
include "vendor/autoload.php";

$api = new \Nelcoa\OpenFireRestAPI\API();
```
### Check result
```php
if($result['response']) {
    echo $result['output'];
} else {
    echo 'Error!';
}
```
### User
```php
//Add a new user
$properties = array('key1' => 'value1', 'key2' => 'value2');
$result = $api->User()->createUser('Username', 'Password', 'Full Name', 'email@domain.com', $properties);

//Delete a user
$result = $api->User()->deleteUser('Username');

//Ban a user
$result = $api->User()->lockoutUser('Username');

//Unban a user
$result = $api->User()->unlockUser('Username');
```
### Roster
```php
//Add to roster
use \Nelcoa\OpenFireRestAPI\Setting\SubscriptionType;
$result = $api->User()->createUserRosterEntry('Username', 'Jid', 'Full Name', SubscriptionType::BOTH, array('group1','group2'));

//Update roster
use \Nelcoa\OpenFireRestAPI\Setting\SubscriptionType;
$result = $api->User()->updateUserRosterEntry('Username', 'Jid', 'Full Name', SubscriptionType::BOTH, array('group1'));

//Delete from roster
$result = $api->User()->deleteUserRosterEntry('Username', 'Jid');
```
### Group
```php
//Create group
$result = $api->Group()->createGroup('groupname', 'description');

//Add to Group
$result = $api->User()->addUserToGroup('Username', array('groupname1', 'groupname2', 'groupname3'));

//Delete from Group
$result = $api->User()->deleteUserFromGroup('Username', array('groupname1','groupname2'));
```
### Message
```php
//Send message to all online users
$result = $api->Message()->sendBroadcastMessage('Hello everybody!');
```
### ChatRoom
```php
//Create a new ChatRoom
$payload = new \Nelcoa\OpenFireRestAPI\Payload\ChatRoom();
$payload->setRoomName('myfirstchatroom');
$payload->setNaturalName('my_first_chat_room');
$payload->setDescription('This is my first chat room!');
$result = $api->ChatRoom()->createChatRoom($payload);

//Add user with role to chat room
$result = $api->ChatRoom()->addUserWithRoleToChatRoom('myfirstchatroom','members','username');

//Add group with role to chat room
$result = $api->ChatRoom()->addGroupWithRoleToChatRoom('myfirstchatroom','outcasts','groupname');

//Delete a user from a chat room
$result = $api->ChatRoom()->deleteUserFromChatRoom('myfirstchatroom','members','username');

//Delete a chat room
$result = $api->ChatRoom()->deleteChatRoom('myfirstchatroom');
```
## CONTACT
- nelcoa lcagnello@gmail.com
