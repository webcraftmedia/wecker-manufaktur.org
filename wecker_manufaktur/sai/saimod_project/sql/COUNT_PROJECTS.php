<?php
namespace SQL;

class COUNT_PROJECTS extends \SYSTEM\DB\QP {
    public static function get_class(){return static::class;}
    public static function mysql(){return
        'SELECT COUNT(*) as `count`'.
        ' FROM projects'.
        ' WHERE (   projects.name LIKE ? OR
                    projects.info LIKE ? OR
                    projects.website LIKE ?
                );';
    }
}