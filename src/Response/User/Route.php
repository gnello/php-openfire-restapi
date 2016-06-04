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

/**
 * Route of User related REST Endpoint
 * Class Route
 * @package Nelcoa\OpenFireRestAPI\Response\User
 * @link http://www.igniterealtime.org/projects/openfire/plugins/restapi/readme.html#user
 */
class Route extends User
{
    /**
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
                $groupnameArray = array();
                if (!is_array($output->groupname)) {
                    $output->groupname = array($output->groupname);
                }
                foreach($output->groupname as $groupname) {
                    $groupnameArray[] = $groupname;
                }
                return $groupnameArray;
                break;

            //TODO: da fare
            case 'retrieveUserRoster':
                $rosterItemArray = array();
                if (!is_array($output->rosterItem)) {
                    $output->rosterItem = array($output->rosterItem);
                }
                return false;
                break;
            
            default:
                return true;
                break;
        }
    }

}