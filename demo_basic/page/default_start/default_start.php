<?php
class default_start extends SYSTEM\PAGE\Page {
    private $tag = NULL;
    private $id = NULL;
    public function __construct($tag,$id) {
        $this->tag = $tag;
        $this->id = $id;
    }
    public static function js(){
        return array(   \SYSTEM\WEBPATH(new PPAGE(),'default_start/js/default_start.js'));
    }
    public static function css(){
        return array(   \SYSTEM\WEBPATH(new PPAGE(),'default_start/css/default_start.css'));}


    public function html(){
            $vars = array();
            $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('demo_basic'));
            return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_start/tpl/default_start.tpl'), $vars);
        }
    }