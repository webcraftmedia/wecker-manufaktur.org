<?php
namespace SAI;
class PPERSON extends \SYSTEM\PATH {
    public function __construct($subpath = '') {
        parent::__construct(new \PSAI(), 'saimod_person/', $subpath);}
}
