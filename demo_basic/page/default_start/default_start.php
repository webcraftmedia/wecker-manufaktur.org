<?php
class default_start extends SYSTEM\PAGE\Page {
    public static function js(){
        return array(   new PPAGE('default_start/js/default_start.js'));}
    public static function css(){
        return array(   new PPAGE('default_start/css/default_start.css'));}
    public function html(){
        $vars = array();
        $vars = array_merge($vars, \SYSTEM\PAGE\text::tag('demo_basic'));
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_start/tpl/default_start.tpl'))->SERVERPATH(), $vars);
    }
}