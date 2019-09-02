<?php
namespace SQL;

class UPDATE_BADGE_ORDER_DOWN_ORDER extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
        'UPDATE `badges` SET `order`=`order` + 1 WHERE `type` = ? AND `ref_id` = ? AND `order` = ?;';
    }
}