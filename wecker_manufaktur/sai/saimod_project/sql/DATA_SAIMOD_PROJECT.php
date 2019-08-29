<?php
namespace SQL;
class DATA_SAIMOD_PROJECT extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_mysql(){
        return array(   (new \SAI\PPROJECT('sql/mysql/system_page.sql'))->SERVERPATH(),
                        (new \SAI\PPROJECT('sql/mysql/system_api.sql'))->SERVERPATH(),
                        (new \SAI\PPROJECT('sql/mysql/persons.schema.sql'))->SERVERPATH(),
                        (new \SAI\PPROJECT('sql/mysql/badges.schema.sql'))->SERVERPATH(),
                        (new \SAI\PPROJECT('sql/mysql/projects.schema.sql'))->SERVERPATH(),
                        (new \SAI\PPROJECT('sql/mysql/person_projects.schema.sql'))->SERVERPATH());
    }    
}