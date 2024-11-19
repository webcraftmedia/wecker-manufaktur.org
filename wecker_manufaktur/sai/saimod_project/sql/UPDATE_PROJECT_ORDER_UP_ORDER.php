<?php
namespace SQL;

class UPDATE_PROJECT_ORDER_UP_ORDER extends \SYSTEM\DB\QP {
    public static function get_class(){return static::class;}
    public static function mysql(){return
        'UPDATE `projects` SET `order`=`order` - 1 WHERE `order` = ?;';
    }
}