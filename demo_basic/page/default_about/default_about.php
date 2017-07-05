<?php
class default_about implements SYSTEM\PAGE\Page {
    public static function title(){
        return \SYSTEM\PAGE\text::get('title_about');}
    public static function meta(){
        return \SYSTEM\PAGE\text::tag('meta_about');}
    public static function js(){
        return array(   new PPAGE('default_about/js/default_about.js'));}
    public static function css(){
        return array(   new PPAGE('default_about/css/default_about.css'));}
    public function html(){
        $vars = \SYSTEM\PAGE\text::tag('example');
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_about/tpl/default_about.tpl'))->SERVERPATH(), $vars);
    }
}