# PhpOpenFireRestAPI
Php REST API Client to manage Openfire Server

## LICENSE
PhpOpenFireRestAPI is licensed under Apache License 2.0, see LICENCE for further information.

## REQUIREMENTS
- PHP 5.3.2+

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
```php
include "vendor/autoload.php";

$api = new \Nelcoa\OpenFireRestAPI\API();

//Add a new user
$result = $api->Users()->createUser('Username', 'Password', 'Full Name', 'jacky@domain.com');

//Check result
if($result['response']) {
    echo $result['output'];
} else {
    echo 'Error!';
}

//Delete a user
$result = $api->Users()->deleteUser('Username');

//Ban a user
$result = $api->Users()->lockoutUser('Username');

//Unban a user
$result = $api->Users()->unlockUser('Username');

//Add to roster
$api->Users()->createUserRosterEntry('Username', 'Jid', 'Full Name');

//Delete from roster
$api->Users()->deleteUserRosterEntry('Username', 'Jid');
```

## CONTACT
- nelcoa lcagnello@gmail.com
