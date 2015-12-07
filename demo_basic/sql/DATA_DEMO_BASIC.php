<?php
namespace SQL;
class DATA_DEMO_BASIC extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_mysql(){
        return array(   \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/system_page.sql'),
                        \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/webcraft_imprint.sql')/*,
                        \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/system_text.sql'),
                        \SYSTEM\SERVERPATH(new \PSQL(),'/mysql/system_cron.sql')*/);
    }    
}