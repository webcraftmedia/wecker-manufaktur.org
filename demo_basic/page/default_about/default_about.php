<?php
class default_about extends SYSTEM\PAGE\Page {
    public static function js(){
        return array(   \SYSTEM\WEBPATH(new PPAGE(),'default_about/js/default_about.js'));}
    public static function css(){
        return array(   \SYSTEM\WEBPATH(new PPAGE(),'default_about/css/default_about.css'));}
    public function html(){
        $vars = \SYSTEM\PAGE\text::tag('example');
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_about/tpl/default_about.tpl'), $vars);
    }
}