<?php
namespace SQL;

class UPDATE_PERSON_ORDER_DOWN_ORDER extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
        'UPDATE `persons` SET `order`=`order` + 1 WHERE `order` = ?;';
    }
}