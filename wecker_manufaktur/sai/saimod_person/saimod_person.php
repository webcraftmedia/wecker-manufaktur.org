<?php
namespace SAI;
class saimod_person extends \SYSTEM\SAI\sai_module{

    public static function sai_mod__SAI_saimod_person($search='%',$page=0){
        $vars = array();
        $vars['search'] = $search;
        $vars['page'] = $page;
        $vars['data'] = '';

        $count      = \SQL\COUNT_PERSONS::Q1(array($search,$search))['count'];
        $abilities  = \SQL\SELECT_BADGES_VISIBLE::QA(array(\SAI\saimod_project::BADGE_TYPE_PERSON_ABILITIES)); // This part we filter phpside due to performance.
        $res        = \SQL\SELECT_PERSONS::QQ(array($search,$search));
        $res->seek(25*$page);

        $count_filtered = 0;
        while(($row = $res->next()) && ($count_filtered < 25)){
            $fabilities = array_filter($abilities, function($v)use($row){return $v['ref_id'] == $row['id'];});
            $row['abilities'] = '';
            foreach($fabilities as $a){
                $row['abilities'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/content_badge.tpl'))->SERVERPATH(),$a);
            }

            $row['selected_invisible'] = $row['visible'] !== 1 ? 'selected' : '';
            $row['selected_visible'] = $row['visible'] == 1 ? 'selected' : '';

            $vars['data'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/saimod_person_tr.tpl'))->SERVERPATH(),$row);
            $count_filtered++;
        }
        // Pagintation
        $vars['pagination'] = '';
        $vars['page_last'] = floor($count/25);
        for($i=0;$i < ceil($count/25);$i++){
            $data = array('page' => $i,'search' => $search, 'active' => ($i == $page) ? 'active' : '');
            $vars['pagination'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/saimod_person_pagination.tpl'))->SERVERPATH(), $data);
        }
        $vars['count'] = ($count_filtered+$page*25).'/'.$count;

        return \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/saimod_person.tpl'))->SERVERPATH(),$vars);
    }

    public static function sai_mod__SAI_saimod_person_action_person_delete($data){
        foreach($data as $id){
            \SQL\DELETE_PERSON::QI(array($id));
            \SQL\DELETE_BADGES::QI(array(self::BADGE_TYPE_PERSON_ABILITIES,$id));
        }
        return \JsonResult::ok();
    }
    public static function sai_mod__SAI_saimod_person_action_person_order($data){
        $person = $data['person'];
        switch($data['action']){
            case 'up':
                $new_order = $data['order'] -1;
                $new_order = $new_order > 0 ? $new_order : 1;
                \SQL\UPDATE_PERSON_ORDER_DOWN_ORDER::QI(array($new_order));
                \SQL\UPDATE_PERSON_ORDER_DOWN_ID::QI(array($person));
                break;
            case 'down':
                $new_order = $data['order'] +1;
                \SQL\UPDATE_PERSON_ORDER_UP_ORDER::QI(array($new_order));
                \SQL\UPDATE_PERSON_ORDER_UP_ID::QI(array($person));    
                break;
            default:
                throw new \SYSTEM\LOG\ERROR('Operration not supported');
        }
        return \SYSTEM\LOG\JsonResult::ok();
    }
    public static function sai_mod__SAI_saimod_person_action_person_visibility($data){
        \SQL\UPDATE_PERSON_VISIBILITY::QI(array($data['visibility'],$data['person']));
        return \SYSTEM\LOG\JsonResult::ok();
    }

    public static function sai_mod__SAI_saimod_person_action_person_new(){
        $vars = array();
        
        //images
        $images = \SYSTEM\FILES\files::get('persons');
        $vars['images'] = '';
        foreach($images as $image){
            $img = ['name' => $image, 'selected' => ''];
            $vars['images'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/saimod_person_image_file.tpl'))->SERVERPATH(),$img);
        }

        return \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/saimod_person_new.tpl'))->SERVERPATH(),$vars);
    }

    public static function sai_mod__SAI_saimod_person_action_person_save($data){
        return  \SYSTEM\LOG\JsonResult::status(
            \SQL\INSERT_PERSON::QI(array(   $data['img'],
                                            $data['name'],
                                            $data['info'],
                                            $data['visibility']))
        );
    }

    public static function sai_mod__SAI_saimod_person_action_person_details($person){
        // $vars = array();
        $vars = \SQL\SELECT_PERSON::Q1(array($person));

        $vars['selected_invisible'] = $vars['visible'] !== 1 ? 'selected' : '';
        $vars['selected_visible'] = $vars['visible'] == 1 ? 'selected' : '';

        //images
        $images = \SYSTEM\FILES\files::get('persons');
        $vars['images'] = '';
        foreach($images as $image){
            $img = ['name' => $image, 'selected' => $vars['img'] == $image ? 'selected' : ''];
            $vars['images'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/saimod_person_image_file.tpl'))->SERVERPATH(),$img);
        }

        // Abilities
        $vars['abilities'] = '';
        $abilities = \SQL\SELECT_BADGES::QQ(array(\SAI\saimod_project::BADGE_TYPE_PERSON_ABILITIES,$person));
        while($row = $abilities->next()){
            $row['selected_invisible'] = $row['visible'] !== 1 ? 'selected' : '';
            $row['selected_visible'] = $row['visible'] == 1 ? 'selected' : '';
            
            $vars['abilities'] .= \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/saimod_person_badge_tr.tpl'))->SERVERPATH(),$row);
        }

        return \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/saimod_person_details.tpl'))->SERVERPATH(),$vars);
    }

    public static function sai_mod__SAI_saimod_person_action_person_update($data){
        return  \SYSTEM\LOG\JsonResult::status(
            \SQL\UPDATE_PERSON::QI(array(  $data['img'],
                                            $data['name'],
                                            $data['info'],
                                            $data['visibility'],
                                            $data['person']))
        );
    }

    public static function sai_mod__SAI_saimod_person_action_person_ability_new($data){
        return  \SYSTEM\LOG\JsonResult::status(
                    \SQL\INSERT_BADGE::QI(array(\SAI\saimod_project::BADGE_TYPE_PERSON_ABILITIES,
                                                $data['person'],
                                                $data['badge'],
                                                $data['color'],
                                                $data['color_text'],
                                                \SAI\saimod_project::BADGE_TYPE_PERSON_ABILITIES,
                                                $data['person'],
                                                $data['visibility']))
                );
    }

    public static function sai_mod__SAI_saimod_person_action_badge_visibility($data){
        \SQL\UPDATE_BADGE_VISIBILITY::QI(array($data['visibility'],$data['badge']));
        return \SYSTEM\LOG\JsonResult::ok();
    }
    public static function sai_mod__SAI_saimod_person_action_badge_order($data){
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
    public static function sai_mod__SAI_saimod_person_action_badge_delete($data){
        foreach($data as $id){
            \SQL\DELETE_BADGE::QI(array($id));
        }
        return \JsonResult::ok();
    }

    public static function menu(){
        return new \SYSTEM\SAI\sai_module_menu( 102,
                                    \SYSTEM\SAI\sai_module_menu::POISITION_LEFT,
                                    \SYSTEM\SAI\sai_module_menu::DIVIDER_NONE,
                                    \SYSTEM\PAGE\replace::replaceFile((new \SAI\PPERSON('tpl/menu.tpl'))->SERVERPATH()));}
    public static function right_public(){return false;}
    public static function right_right(){return \SYSTEM\SECURITY\security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    public static function js(){
        return array(new \SAI\PPERSON('js/saimod_person.js'));}
}