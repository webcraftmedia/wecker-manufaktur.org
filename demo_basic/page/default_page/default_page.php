<?php
class default_page extends \SYSTEM\PAGE\Page {
    private static function js(){        
        return  \SYSTEM\HTML\html::script(\LIB\lib_jquery::js()->WEBPATH()).
                \SYSTEM\HTML\html::script(\LIB\lib_bootstrap::js()->WEBPATH()).
                \SYSTEM\HTML\html::script(\LIB\lib_system::js()->WEBPATH()).
                \SYSTEM\HTML\html::script((new PPAGE('default_page/js/default_page.js'))->WEBPATH());
    }
    
    private static function css(){  
        return  \SYSTEM\HTML\html::link(\LIB\lib_bootstrap::css()->WEBPATH()).
                \SYSTEM\HTML\html::link((new PPAGE('default_page/css/default_page.css'))->WEBPATH());
    }
    
    public function html($_escaped_fragment_ = null){
        $vars = array();
        $vars['js'] = '';
        if(!$_escaped_fragment_){
            $vars['js'] = self::js();}
        $vars['css'] = self::css();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('demo_basic'));
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/default_page.tpl'))->SERVERPATH(), $vars);
    }
}