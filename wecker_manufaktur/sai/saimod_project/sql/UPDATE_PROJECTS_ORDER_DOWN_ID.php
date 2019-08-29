<?php
namespace SQL;

class UPDATE_PROJECTS_ORDER_DOWN_ID extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
        'UPDATE `projects` SET `order`=`order` - 1 WHERE `id` = ?;';
    }
}