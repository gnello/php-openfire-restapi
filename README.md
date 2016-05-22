# PhpOpenFireRestAPI
Php REST API Client to manage Openfire Server

## LICENSE
PhpOpenFireRestAPI is licensed under Apache License 2.0, see LICENCE for further information.

## REQUIREMENTS
- PHP 5.3+

## INSTALLATION
### Composer
```json
{
    "require": {
        "nelcoa/PhpOpenFireRestAPI": "dev-master"
    }
}
```

## CONFIGURATION
Just change these constants into Settings.php
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
$api->Settings()->setSecret("your_secret");
$api->Settings()->setHost("your_host");
$api->Settings()->setServerName("your_servername");

//Default values
$api->Settings()->setPort("9090");
$api->Settings()->setSSL(false);
$api->Settings()->setPlugin("/plugins/restapi/v1");
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
### Roster
```php
//Add to roster
$result = $api->Users()->createUserRosterEntry('Username', 'Jid', 'Full Name', 3, array('group1','group2'));

//Update roster
$result = $api->Users()->updateUserRosterEntry('Username', 'Jid', 'Full Name', 3, array('group1'));

//Delete from roster
$result = $api->Users()->deleteUserRosterEntry('Username', 'Jid');
```
### Groups
```php
//Create group
$result = $api->Groups()->createGroup('groupname', 'description');

//Add to groups
$result = $api->Users()->addUserToGroup('Username', array('groupname1', 'groupname2', 'groupname3'));

//Delete from groups
$result = $api->Users()->deleteUserFromGroups('Username', array('groupname1','groupname2'));
```
### Messages
```php
//Send message to all online users
$result = $api->Messages()->sendBroadcastMessage('Hello everybody!');
```

## CONTACT
- nelcoa lcagnello@gmail.com
