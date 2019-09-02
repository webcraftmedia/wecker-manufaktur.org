<?php
namespace SQL;
class DATA_SAIMOD_PERSON extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_mysql(){
        return array(   (new \SAI\PPERSON('sql/mysql/system_page.sql'))->SERVERPATH(),
                        (new \SAI\PPERSON('sql/mysql/system_api.sql'))->SERVERPATH());
    }    
}