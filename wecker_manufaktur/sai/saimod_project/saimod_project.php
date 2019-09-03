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

            $vars['data'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_project_tr.tpl'))->SERVERPATH(),$row);
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
            \SQL\DELETE_BADGES::QI(array(self::BADGE_TYPE_PROJECT_FOCUS,$id));
            \SQL\DELETE_BADGES::QI(array(self::BADGE_TYPE_PROJECT_TYPE,$id));
        }
        return \JsonResult::ok();
    }
    public static function sai_mod__SAI_saimod_project_action_project_order($data){
        $project = $data['project'];
        switch($data['action']){
            case 'up':
                $new_order = $data['order'] -1;
                $new_order = $new_order > 0 ? $new_order : 1;
                \SQL\UPDATE_PROJECT_ORDER_DOWN_ORDER::QI(array($new_order));
                \SQL\UPDATE_PROJECT_ORDER_DOWN_ID::QI(array($project));
                break;
            case 'down':
                $new_order = $data['order'] +1;
                \SQL\UPDATE_PROJECT_ORDER_UP_ORDER::QI(array($new_order));
                \SQL\UPDATE_PROJECT_ORDER_UP_ID::QI(array($project));    
                break;
            default:
                throw new \SYSTEM\LOG\ERROR('Operration not supported');
        }
        return \SYSTEM\LOG\JsonResult::ok();
    }
    public static function sai_mod__SAI_saimod_project_action_project_visibility($data){
        \SQL\UPDATE_PROJECT_VISIBILITY::QI(array($data['visibility'],$data['project']));
        return \SYSTEM\LOG\JsonResult::ok();
    }

    public static function sai_mod__SAI_saimod_project_action_project_new(){
        $vars = array();
        
        //images
        $images = \SYSTEM\FILES\files::get('projects');
        $vars['images'] = '';
        foreach($images as $image){
            $img = ['name' => $image, 'selected' => ''];
            $vars['images'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_project_image_file.tpl'))->SERVERPATH(),$img);
        }

        return \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_project_new.tpl'))->SERVERPATH(),$vars);
    }

    public static function sai_mod__SAI_saimod_project_action_project_save($data){
        return  \SYSTEM\LOG\JsonResult::status(
            \SQL\INSERT_PROJECT::QI(array(  $data['img'],
                                            $data['name'],
                                            $data['info'],
                                            $data['website'],
                                            $data['visibility']))
        );
    }

    public static function sai_mod__SAI_saimod_project_action_project_details($project){
        // $vars = array();
        $vars = \SQL\SELECT_PROJECT::Q1(array($project));

        $vars['selected_invisible'] = $vars['visible'] !== 1 ? 'selected' : '';
        $vars['selected_visible'] = $vars['visible'] == 1 ? 'selected' : '';

        //images
        $images = \SYSTEM\FILES\files::get('projects');
        $vars['images'] = '';
        foreach($images as $image){
            $img = ['name' => $image, 'selected' => $vars['img'] == $image ? 'selected' : ''];
            $vars['images'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_project_image_file.tpl'))->SERVERPATH(),$img);
        }

        // Focus
        $vars['focus'] = '';
        $focus = \SQL\SELECT_BADGES::QQ(array(self::BADGE_TYPE_PROJECT_FOCUS,$project));
        while($row = $focus->next()){
            $row['selected_invisible'] = $row['visible'] !== 1 ? 'selected' : '';
            $row['selected_visible'] = $row['visible'] == 1 ? 'selected' : '';
            
            $vars['focus'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_project_badge_tr.tpl'))->SERVERPATH(),$row);
        }

        // Type
        $vars['type'] = '';
        $type = \SQL\SELECT_BADGES::QQ(array(self::BADGE_TYPE_PROJECT_TYPE,$project));
        while($row = $type->next()){
            $row['selected_invisible'] = $row['visible'] !== 1 ? 'selected' : '';
            $row['selected_visible'] = $row['visible'] == 1 ? 'selected' : '';

            $vars['type'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_project_badge_tr.tpl'))->SERVERPATH(),$row);
        }

        return \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPROJECT('tpl/saimod_project_details.tpl'))->SERVERPATH(),$vars);
    }

    public static function sai_mod__SAI_saimod_project_action_project_update($data){
        return  \SYSTEM\LOG\JsonResult::status(
            \SQL\UPDATE_PROJECT::QI(array(  $data['img'],
                                            $data['name'],
                                            $data['info'],
                                            $data['website'],
                                            $data['visibility'],
                                            $data['project']))
        );
    }

    public static function sai_mod__SAI_saimod_project_action_project_focus_new($data){
        return  \SYSTEM\LOG\JsonResult::status(
                    \SQL\INSERT_BADGE::QI(array(self::BADGE_TYPE_PROJECT_FOCUS,
                                                $data['project'],
                                                $data['badge'],
                                                $data['color'],
                                                $data['color_text'],
                                                self::BADGE_TYPE_PROJECT_FOCUS,
                                                $data['project'],
                                                $data['visibility']))
                );
    }
    public static function sai_mod__SAI_saimod_project_action_project_type_new($data){
        return  \SYSTEM\LOG\JsonResult::status(
                    \SQL\INSERT_BADGE::QI(array(self::BADGE_TYPE_PROJECT_TYPE,
                                                $data['project'],
                                                $data['badge'],
                                                $data['color'],
                                                $data['color_text'],
                                                self::BADGE_TYPE_PROJECT_TYPE,
                                                $data['project'],
                                                $data['visibility']))
                );
    }

    public static function sai_mod__SAI_saimod_project_action_badge_visibility($data){
        \SQL\UPDATE_BADGE_VISIBILITY::QI(array($data['visibility'],$data['badge']));
        return \SYSTEM\LOG\JsonResult::ok();
    }
    public static function sai_mod__SAI_saimod_project_action_badge_order($data){
        $badge = $data['badge'];
        $type = $data['type'];
        $ref_id = $data['ref_id'];
        switch($data['action']){
            case 'up':
                $new_order = $data['order'] -1;
                $new_order = $new_order > 0 ? $new_order : 1;
                \SQL\UPDATE_BADGE_ORDER_DOWN_ORDER::QI(array($type,$ref_id,$new_order));
                \SQL\UPDATE_BADGE_ORDER_DOWN_ID::QI(array($badge));
                break;
            case 'down':
                $new_order = $data['order'] +1;
                \SQL\UPDATE_BADGE_ORDER_UP_ORDER::QI(array($type,$ref_id,$new_order));
                \SQL\UPDATE_BADGE_ORDER_UP_ID::QI(array($badge));    
                break;
            default:
                throw new \SYSTEM\LOG\ERROR('Operration not supported');
        }
        return \SYSTEM\LOG\JsonResult::ok();
    }
    public static function sai_mod__SAI_saimod_project_action_badge_delete($data){
        foreach($data as $id){
            \SQL\DELETE_BADGE::QI(array($id));
        }
        return \JsonResult::ok();
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