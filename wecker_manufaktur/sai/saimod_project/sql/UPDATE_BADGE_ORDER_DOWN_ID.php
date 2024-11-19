<?php
namespace SQL;

class UPDATE_BADGE_ORDER_DOWN_ID extends \SYSTEM\DB\QP {
    public static function get_class(){return static::class;}
    public static function mysql(){return
        'UPDATE `badges` SET `order`=`order` - 1 WHERE `id` = ?;';
    }
}