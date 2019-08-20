<?php
class default_page implements \SYSTEM\PAGE\DefaultPage {
    public static function js(){        
        return  \SYSTEM\HTML\html::script(\SYSTEM\CACHE\cache_js::minify(array(
                    \LIB\lib_jquery::js(),
                    \LIB\lib_bootstrap::js(),
                    \LIB\lib_system::js(),
                    new PPAGE('default_page/js/default_page.js')
                )));
    }
    
    public static function css(){
        return  \SYSTEM\HTML\html::link(\LIB\lib_bootstrap::css()->WEBPATH(false)).
                \SYSTEM\HTML\html::link(\SYSTEM\CACHE\cache_css::minify(array(
                    new PPAGE('default_page/css/default_page.css')
                )));
    }
    
    public function html($_escaped_fragment_ = null){
        $vars = array();
        $vars['js'] = '';
        if(!$_escaped_fragment_){
            $vars['js'] = self::js();}
        $vars['css'] = self::css();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('wecker_manufaktur'));
        return SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/default_page.tpl'))->SERVERPATH(), $vars);
    }
}