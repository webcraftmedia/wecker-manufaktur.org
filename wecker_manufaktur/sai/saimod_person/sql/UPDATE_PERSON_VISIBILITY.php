<?php
namespace SQL;

class UPDATE_PERSON_VISIBILITY extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
        'UPDATE `persons` SET `visible` = ? WHERE `id` = ?;';
    }
}