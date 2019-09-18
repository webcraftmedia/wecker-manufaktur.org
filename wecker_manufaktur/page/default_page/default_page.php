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
                    new PPAGE('default_page/css/font.css'),
                    new PPAGE('default_page/css/default_page.scss')
                )));
    }

    private static function getPersons(){
        $result = '';

        $column_counter = 0;
        $content        = '';

        $persons        = \SQL\SELECT_PERSONS_VISIBLE::QQ();
        $person_badges  = \SQL\SELECT_BADGES_VISIBLE::QA(array(\SAI\saimod_project::BADGE_TYPE_PERSON_ABILITIES));   // This part we filter phpside due to performance.
        $person_projects= \SQL\SELECT_PERSON_PROJECTS::QA();                                  // This part we filter phpside due to performance.
        while($row = $persons->next()){

            $badges = array_filter($person_badges, function($v)use($row){return $v['ref_id'] == $row['id'];});
            $row['badges'] = '';
            foreach($badges as $badge){
                $row['badges'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/content_badge.tpl'))->SERVERPATH(),$badge);
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

            $content      .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/person.tpl'))->SERVERPATH(),$row);

            // Insert full row and start a new row
            if($column_counter++ === 2){
                $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_row.tpl'))->SERVERPATH(),
                                                            array(  'content'     => $content));
                $column_counter = 0;
                $content        = '';
            }
        }
        // Insert incomplete rows
        if($column_counter != 0){
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_row.tpl'))->SERVERPATH(),
                                                            array(  'content'     => $content));
        }

        return $result;
    }

    private static function getProjects(){
        $result = '';

        $column_counter = 0;
        $content        = '';

        $projects       = \SQL\SELECT_PROJECTS_VISIBLE::QQ();
        $project_focus  = \SQL\SELECT_BADGES_VISIBLE::QA(array(\SAI\saimod_project::BADGE_TYPE_PROJECT_FOCUS)); // This part we filter phpside due to performance.
        $project_type   = \SQL\SELECT_BADGES_VISIBLE::QA(array(\SAI\saimod_project::BADGE_TYPE_PROJECT_TYPE));  // This part we filter phpside due to performance.
        $project_persons= \SQL\SELECT_PROJECT_PERSONS::QA();                                                    // This part we filter phpside due to performance.
        while($row = $projects->next()){

            $focus = array_filter($project_focus, function($v)use($row){return $v['ref_id'] == $row['id'];});
            $row['focus'] = '';
            foreach($focus as $f){
                $row['focus'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/content_badge.tpl'))->SERVERPATH(),$f);
            }

            $type = array_filter($project_type, function($v)use($row){return $v['ref_id'] == $row['id'];});
            $row['type'] = '';
            foreach($type as $t){
                $row['type'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/content_badge.tpl'))->SERVERPATH(),$t);
            }

            $persons = array_filter($project_persons, function($v)use($row){return $v['project'] == $row['id'];});
            $row['persons'] = '';
            foreach($persons as $person){
                $row['persons'] .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/project_person.tpl'))->SERVERPATH(),$person);
            }

            $content      .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/project.tpl'))->SERVERPATH(),$row);

            // Insert full row and start a new row
            if($column_counter++ === 2){
                $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_row.tpl'))->SERVERPATH(),
                                                            array(  'content'     => $content));
                $column_counter = 0;
                $content        = '';
            }
        }
        // Insert incomplete rows
        if($column_counter != 0){
            $result .= \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_row.tpl'))->SERVERPATH(),
                                                            array(  'content'     => $content));
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
        $vars['_content_apply'] = \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/content_apply.tpl'))->SERVERPATH());
        $vars['_modal_imprint'] = \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/modal_imprint.tpl'))->SERVERPATH());
        $vars['_modal_dataprotection'] = \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/modal_dataprotection.tpl'))->SERVERPATH());
        $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('wecker_manufaktur'));
        return \SYSTEM\PAGE\replace::replaceFile((new PPAGE('default_page/tpl/default_page.tpl'))->SERVERPATH(), $vars);
    }
}