<?php
class PSQL extends \SYSTEM\PATH {
    public function __construct($subpath = '') {
        parent::__construct(new \SYSTEM\PROOT(), 'wecker_manufaktur/sql/', $subpath);}
}