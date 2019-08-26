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

        $column_counter     = 0;
        $_content_imgs      = '';
        $_content_details   = '';

        $persons        = \SQL\SELECT_PERSONS::QQ();
        $person_badges  = \SQL\SELECT_PERSON_BADGES::QA();   // This part we filter phpside due to performance.
        $person_projects= \SQL\SELECT_PERSON_PROJECTS::QA(); // This part we filter phpside due to performance.
        while($row = $persons->next()){

            $badges = array_filter($person_badges, function($v)use($row){return $v['person'] == $row['id'];});
            $row['badges'] = '';
            foreach($badges as $badge){
                $row['badges'] .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_badge.tpl'))->SERVERPATH(),$badge);
            }

            $projects = array_filter($person_projects, function($v)use($row){return $v['person'] == $row['id'];});
            $row['projects'] = '';
            foreach($projects as $project){
                $project['link']    = $project['visible'] != 1 ? $project['website'] : '#project-'.$project['project']; 
                $project['target']  = $project['visible'] != 1 ? '_blank' : ''; 
                $row['projects'] .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/person_project.tpl'))->SERVERPATH(),$project);
                $row['projects'] .= ' | ';
            }
            $row['projects'] = substr($row['projects'],0,-3);

            $_content_imgs      .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/person_img.tpl'))->SERVERPATH(),$row);
            $_content_details   .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/person_details.tpl'))->SERVERPATH(),$row);

            // Insert full row and start a new row
            if($column_counter++ === 2){
                $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_row.tpl'))->SERVERPATH(),
                                                            array(  '_content_imgs'     => $_content_imgs,
                                                                    '_content_details'  => $_content_details));
                $column_counter     = 0;
                $_content_imgs      = '';
                $_content_details   = '';
            }
        }
        // Insert incomplete rows
        if($column_counter != 0){
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_row.tpl'))->SERVERPATH(),
                                                            array(  '_content_imgs'     => $_content_imgs,
                                                                    '_content_details'  => $_content_details));
        }

        return $result;
    }

    private static function getProjects(){
        $result = '';

        $column_counter     = 0;
        $_content_imgs      = '';
        $_content_details   = '';

        $projects       = \SQL\SELECT_PROJECTS::QQ();
        $project_focus  = \SQL\SELECT_PROJECT_FOCUS::QA();  // This part we filter phpside due to performance.
        $project_type   = \SQL\SELECT_PROJECT_TYPE::QA();   // This part we filter phpside due to performance.
        $project_persons= \SQL\SELECT_PROJECT_PERSONS::QA();// This part we filter phpside due to performance.
        while($row = $projects->next()){

            $focus = array_filter($project_focus, function($v)use($row){return $v['project'] == $row['id'];});
            $row['focus'] = '';
            foreach($focus as $f){
                $f['badge'] = $f['focus'];
                $row['focus'] .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_badge.tpl'))->SERVERPATH(),$f);
            }

            $type = array_filter($project_type, function($v)use($row){return $v['project'] == $row['id'];});
            $row['type'] = '';
            foreach($type as $t){
                $t['badge'] = $t['type'];
                $row['type'] .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_badge.tpl'))->SERVERPATH(),$t);
            }

            $persons = array_filter($project_persons, function($v)use($row){return $v['project'] == $row['id'];});
            $row['persons'] = '';
            foreach($persons as $person){
                $row['persons'] .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/project_person.tpl'))->SERVERPATH(),$person);
            }

            $_content_imgs      .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/project_img.tpl'))->SERVERPATH(),$row);
            $_content_details   .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/project_details.tpl'))->SERVERPATH(),$row);

            // Insert full row and start a new row
            if($column_counter++ === 2){
                $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_row.tpl'))->SERVERPATH(),
                                                            array(  '_content_imgs'     => $_content_imgs,
                                                                    '_content_details'  => $_content_details));
                $column_counter     = 0;
                $_content_imgs      = '';
                $_content_details   = '';
            }
        }
        // Insert incomplete rows
        if($column_counter != 0){
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_row.tpl'))->SERVERPATH(),
                                                            array(  '_content_imgs'     => $_content_imgs,
                                                                    '_content_details'  => $_content_details));
        }

        return $result;
    }
    
    public function html($_escaped_fragment_ = null){
        $vars = array();
        $vars['js'] = '';
        if(!$_escaped_fragment_){
            $vars['js'] = self::js();}
        $vars['css'] = self::css();
        $vars['_content_persons']   = self::getPersons();
        $vars['_content_projects']  = self::getProjects();
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('wecker_manufaktur'));
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/default_page.tpl'))->SERVERPATH(), $vars);
    }
}