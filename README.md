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

// Set the required config parameters
\Nelcoa\OpenFireRestAPI\Settings\Settings::setSecret("your_secret");
\Nelcoa\OpenFireRestAPI\Settings\Settings::setHost("your_host");
\Nelcoa\OpenFireRestAPI\Settings\Settings::setServerName("your_servername");

//Default values
\Nelcoa\OpenFireRestAPI\Settings\Settings::setPort("9090");
\Nelcoa\OpenFireRestAPI\Settings\Settings::setSSL(false);
\Nelcoa\OpenFireRestAPI\Settings\Settings::setPlugin("/plugins/restapi/v1");
```

## USAGE
```php
include "vendor/autoload.php";

//Add a new user
$result = \Nelcoa\OpenFireRestAPI\Users::createUser('Username', 'Password', 'Full Name', 'jacky@domain.com');

//Check result
if($result['response']) {
    echo $result['output'];
} else {
    echo 'Error!';
}

//Delete a user
$result = \Nelcoa\OpenFireRestAPI\Users::deleteUser('Username');

//Ban a user
$result = \Nelcoa\OpenFireRestAPI\Users::lockoutUser('Username');

//Unban a user
$result = \Nelcoa\OpenFireRestAPI\Users::unlockUser('Username');

//Add to roster
\Nelcoa\OpenFireRestAPI\Users::createUserRosterEntry('Username', 'Jid', 'Full Name');

//Delete from roster
\Nelcoa\OpenFireRestAPI\Users::deleteUserRosterEntry('Username', 'Jid');
```

## CONTACT
- nelcoa lcagnello@gmail.com
