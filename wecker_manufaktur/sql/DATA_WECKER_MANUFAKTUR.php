<?php
namespace SQL;
class DATA_WECKER_MANUFAKTUR extends \SYSTEM\DB\QI {
    public static function get_class(){return \get_class();}
    public static function files_mysql(){
        return array(   (new \PSQL('/mysql/system_api.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/system_page.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/system_text.sql'))->SERVERPATH(),
                        (new \PSQL('/mysql/saimod_mail.sql'))->SERVERPATH());
    }    
}