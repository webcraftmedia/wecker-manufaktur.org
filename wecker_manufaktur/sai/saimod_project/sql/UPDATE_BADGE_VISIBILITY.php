<?php
namespace SQL;

class UPDATE_BADGE_VISIBILITY extends \SYSTEM\DB\QP {
    public static function get_class(){return static::class;}
    public static function mysql(){return
        'UPDATE `badges` SET `visible` = ? WHERE `id` = ?;';
    }
}