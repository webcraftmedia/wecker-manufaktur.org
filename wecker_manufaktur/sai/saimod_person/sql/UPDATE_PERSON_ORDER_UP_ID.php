<?php
namespace SQL;

class UPDATE_PERSON_ORDER_UP_ID extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
        'UPDATE `persons` SET `order`=`order` + 1 WHERE `id` = ?;';
    }
}