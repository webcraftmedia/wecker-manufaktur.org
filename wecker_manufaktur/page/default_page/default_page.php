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
        return  \SYSTEM\HTML\html::link(\SYSTEM\CACHE\cache_css::minify(array(
                    \LIB\lib_bootstrap::css(),
                    \LIB\lib_font_awesome::css(),
                    new PPAGE('default_page/css/default_page.scss')
                )));
    }

    private static function getPersons(){
        $result = '';

        $column_counter             = 0;
        $_content_persons_imgs      = '';
        $_content_persons_details   = '';

        $persons = \SQL\SELECT_PERSONS::QQ();
        $person_badges = \SQL\SELECT_PERSON_BADGES::QA(); // This part we filter phpside due to performance.
        while($row = $persons->next()){

            $badges = array_filter($person_badges, function($v)use($row){return $v['person'] == $row['id'];});
            $row['badges'] = '';
            foreach($badges as $badge){
                $row['badges'] .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/person_badge.tpl'))->SERVERPATH(),$badge);
            }

            $_content_persons_imgs      .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/person_img.tpl'))->SERVERPATH(),$row);
            $_content_persons_details   .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/person_details.tpl'))->SERVERPATH(),$row);

            // Insert full row and start a new row
            if($column_counter++ === 2){
                $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/persons_row.tpl'))->SERVERPATH(),
                                                            array(  '_content_persons_imgs' => $_content_persons_imgs,
                                                                    '_content_persons_details' => $_content_persons_details));
                $column_counter             = 0;
                $_content_persons_imgs      = '';
                $_content_persons_details   = '';
            }
        }
        // Insert incomplete rows
        if($column_counter != 0){
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/persons_row.tpl'))->SERVERPATH(),
                                                            array(  '_content_persons_imgs' => $_content_persons_imgs,
                                                                    '_content_persons_details' => $_content_persons_details));
        }

        return $result;
    }
    
    public function html($_escaped_fragment_ = null){
        $vars = array();
        $vars['js'] = '';
        if(!$_escaped_fragment_){
            $vars['js'] = self::js();}
        $vars['css'] = self::css();
        //$vars['_content_persons'] = \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_persons.tpl'))->SERVERPATH());
        $vars['_content_persons'] = self::getPersons();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('wecker_manufaktur'));
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/default_page.tpl'))->SERVERPATH(), $vars);
    }
}