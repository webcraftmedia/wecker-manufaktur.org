<?php
class default_impressum extends \SYSTEM\PAGE\Page {
    public function html(){
        $vars = array();
        $vars['impressum'] = \SYSTEM\PAGE\text::get('webcraft_imprint');
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_impressum/tpl/impressum.tpl'))->SERVERPATH(), $vars);
    }
    public static function js(){
        return array(   new PPAGE('default_impressum/js/default_impressum.js'));
    }
}