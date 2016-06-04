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

namespace Nelcoa\OpenFireRestAPI\Response\User;
use Nelcoa\OpenFireRestAPI\Utils\Utils;

/**
 * Route of User related REST Endpoint
 * Class Route
 * @package Nelcoa\OpenFireRestAPI\Response\User
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#user
 */
class Route extends User
{
    /**
     * This function parses the server output and return specific object
     * @param array $response
     * @param $function
     * @return bool|Route
     */
    public static function route(array $response, $function)
    {
        if ($response['response']) {
            $output = $response['output'];
        } else {
            return false;
        }

        switch ($function) 
        {
            case 'retrieveUsers':
                $list = array();
                foreach ($output->user as $stdClass) {
                    $list[$stdClass->username] = new User($stdClass);
                }
                return $list;
                break;
            
            case 'retrieveUser':
                return new User($output);
                break;

            case 'retrieveAllUserGroups':
                $groupNameArray = array();
                $array = Utils::toArray($output->groupname);
                foreach($array as $groupName) {
                    $groupNameArray[] = $groupName;
                }
                return $groupNameArray;
                break;

            case 'retrieveUserRoster':
                $rosterItemArray = array();
                $array = Utils::toArray($output->rosterItem);
                foreach ($array as $stdClass) {
                    $rosterItemArray[$stdClass->jid] = new RosterItem($stdClass);
                }
                return $rosterItemArray;
                break;
            
            default:
                return true;
                break;
        }
    }

}