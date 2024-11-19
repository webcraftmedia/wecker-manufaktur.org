<?php
namespace SQL;

class UPDATE_PERSON_ORDER_DOWN_ID extends \SYSTEM\DB\QP {
    public static function get_class(){return static::class;}
    public static function mysql(){return
        'UPDATE `persons` SET `order`=`order` - 1 WHERE `id` = ?;';
    }
}