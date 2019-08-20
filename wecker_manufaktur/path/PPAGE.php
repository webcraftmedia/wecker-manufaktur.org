<?php
class PPAGE extends \SYSTEM\PATH {
    public function __construct($subpath = '') {
        parent::__construct(new \SYSTEM\PROOT(), 'wecker_manufaktur/page/', $subpath);}
}