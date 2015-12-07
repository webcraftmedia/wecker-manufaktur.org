<?php
class default_impressum extends \SYSTEM\PAGE\Page {
    public function html(){
        $vars = array();
        $vars['impressum'] = \SYSTEM\PAGE\text::get('webcraft_imprint');
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_impressum/tpl/impressum.tpl'), $vars);
    }
    public static function js(){
        return array(   \SYSTEM\WEBPATH(new PPAGE(),'default_impressum/js/default_impressum.js'));
    }
}