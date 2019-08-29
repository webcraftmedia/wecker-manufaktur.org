<?php
namespace SAI;
class PPROJECT extends \SYSTEM\PATH {
    public function __construct($subpath = '') {
        parent::__construct(new \PSAI(), 'saimod_project/', $subpath);}
}
