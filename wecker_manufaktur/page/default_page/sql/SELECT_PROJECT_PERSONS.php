<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     SYSTEM\SQL
 */
namespace SQL;

/**
 * QQ to get System Api Tree by group
 */
class SELECT_PROJECT_PERSONS extends \SYSTEM\DB\QQ {
    /**
     * Get Classname of the QQ
     * 
     * @return string Returns classname
     */
    public static function get_class(){return \get_class();}
    
    /**
     * Get QQs MYSQL Query String
     * 
     * @return string Returns MYSQL Query String
     */
    public static function mysql(){return
        'SELECT `person_projects`.`person`, `person_projects`.`project`, `persons`.`id`, `persons`.`img`, `persons`.`name`'.
        ' FROM `person_projects`'.
        ' LEFT JOIN `persons` ON `person_projects`.`person` = `persons`.`id`'.
        ' WHERE `persons`.`visible` = 1'.
        ' ORDER BY `persons`.`order`';
    }    
}