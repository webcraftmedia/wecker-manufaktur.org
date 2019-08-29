<?php
namespace SAI;
class saimod_project extends \SYSTEM\SAI\sai_module{

    const BADGE_TYPE_PERSON_ABILITIES   = 1;
    const BADGE_TYPE_PROJECT_FOCUS      = 10;
    const BADGE_TYPE_PROJECT_TYPE       = 11;

    public static function sai_mod__SAI_saimod_project($search='%',$page=0){
        $vars = array();
        $vars['search'] = $search;
        $vars['page'] = $page;
        $vars['data'] = '';

        $count = \SQL\COUNT_PROJECTS::Q1(array($search,$search,$search))['count'];
        $focus = \SQL\SELECT_BADGES_VISIBLE::QA(array(self::BADGE_TYPE_PROJECT_FOCUS)); // This part we filter phpside due to performance.
        $type  = \SQL\SELECT_BADGES_VISIBLE::QA(array(self::BADGE_TYPE_PROJECT_TYPE));  // This part we filter phpside due to performance.
        $res   = \SQL\SELECT_PROJECTS::QQ(array($search,$search,$search));
        $res->seek(25*$page);

        $count_filtered = 0;
        while(($row = $res->next()) && ($count_filtered < 25)){
            $ffocus = array_filter($focus, function($v)use($row){return $v['ref_id'] == $row['id'];});
            $row['focus'] = '';
            foreach($ffocus as $f){
                $row['focus'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/content_badge.tpl'))->SERVERPATH(),$f);
            }

            $ftype = array_filter($type, function($v)use($row){return $v['ref_id'] == $row['id'];});
            $row['type'] = '';
            foreach($ftype as $t){
                $row['type'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/content_badge.tpl'))->SERVERPATH(),$t);
            }

            $row['selected_invisible'] = $row['visible'] !== 1 ? 'selected' : '';
            $row['selected_visible'] = $row['visible'] == 1 ? 'selected' : '';

            $vars['data'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_projects_tr.tpl'))->SERVERPATH(),$row);
            $count_filtered++;
        }
        // Pagintation
        $vars['pagination'] = '';
        $vars['page_last'] = floor($count/25);
        for($i=0;$i < ceil($count/25);$i++){
            $data = array('page' => $i,'search' => $search, 'active' => ($i == $page) ? 'active' : '');
            $vars['pagination'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_project_pagination.tpl'))->SERVERPATH(), $data);
        }
        $vars['count'] = ($count_filtered+$page*25).'/'.$count;

        return \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_project.tpl'))->SERVERPATH(),$vars);
    }

    public static function sai_mod__SAI_saimod_project_action_project_delete($data){
        foreach($data as $id){
            \SQL\DELETE_PROJECT::QI(array($id));
            \SQL\DELETE_BADGE::QI(array(self::BADGE_TYPE_PROJECT_FOCUS,$id));
            \SQL\DELETE_BADGE::QI(array(self::BADGE_TYPE_PROJECT_TYPE,$id));
        }
        return \JsonResult::ok();
    }
    public static function sai_mod__SAI_saimod_project_action_project_order($data){
        $project = $data['project'];
        switch($data['action']){
            case 'up':
                $new_order = $data['order'] -1;
                $new_order = $new_order > 0 ? $new_order : 1;
                \SQL\UPDATE_PROJECTS_ORDER_DOWN_ORDER::QI(array($new_order));
                \SQL\UPDATE_PROJECTS_ORDER_DOWN_ID::QI(array($project));
                break;
            case 'down':
                $new_order = $data['order'] +1;
                \SQL\UPDATE_PROJECTS_ORDER_UP_ORDER::QI(array($new_order));
                \SQL\UPDATE_PROJECTS_ORDER_UP_ID::QI(array($project));    
                break;
            default:
                throw new \SYSTEM\LOG\ERROR('Operration not supported');
        }
        return \SYSTEM\LOG\JsonResult::ok();
    }
    public static function sai_mod__SAI_saimod_project_action_project_visibility($data){
        \SQL\UPDATE_PROJECTS_VISIBILITY::QI(array($data['visibility'],$data['project']));
        return \SYSTEM\LOG\JsonResult::ok();
    }

    public static function menu(){
        return new \SYSTEM\SAI\sai_module_menu( 101,
                                    \SYSTEM\SAI\sai_module_menu::POISITION_LEFT,
                                    \SYSTEM\SAI\sai_module_menu::DIVIDER_LEFT,
                                    \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/menu.tpl'))->SERVERPATH()));}
    public static function right_public(){return false;}
    public static function right_right(){return \SYSTEM\SECURITY\security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    public static function js(){
        return array(new \SAI\PPROJECT('js/saimod_project.js'));}
}