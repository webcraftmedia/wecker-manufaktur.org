<?php
namespace SQL;

class COUNT_PERSONS extends \SYSTEM\DB\QP {
    public static function get_class(){return \get_class();}
    public static function mysql(){return
        'SELECT COUNT(*) as `count`'.
        ' FROM persons'.
        ' WHERE (   persons.name LIKE ? OR
                    persons.info LIKE ?
                );';
    }
}