<?php
namespace SQL;

class UPDATE_PROJECT_VISIBILITY extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
        'UPDATE `projects` SET `visible` = ? WHERE `id` = ?;';
    }
}