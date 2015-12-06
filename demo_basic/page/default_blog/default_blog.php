<?php
class default_blog extends SYSTEM\PAGE\Page {
    private $tag = NULL;
    private $id = NULL;
    public function __construct($tag,$id) {
        $this->tag = $tag;
        $this->id = $id;
    }
    public static function js(){
        return array(   \SYSTEM\WEBPATH(new PPAGE(),'default_blog/js/default_blog.js'));
    }
    public static function css(){
        return array(   \SYSTEM\WEBPATH(new PPAGE(),'default_blog/css/default_blog.css'));}
    
    private static function time_elapsed_string($ptime){
        $etime = time() - $ptime;
        if ($etime < 1){
            return '0 seconds';}

        $a = array( 12 * 30 * 24 * 60 * 60  =>  'Jahr(en)',
                    30 * 24 * 60 * 60       =>  'Monat(en)',
                    24 * 60 * 60            =>  'Tag(en)',
                    60 * 60                 =>  'Stunde(n)',
                    60                      =>  'Minute(n)',
                    1                       =>  'Sekunden');

        foreach ($a as $secs => $str){
            $d = $etime / $secs;
            if ($d >= 1){
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? '' : '') . ' ';}
        }
    }
        
    public static function get_content($default,$tag = null,$id = null){
        if($id){
            $text = \DBD\MRECHEL_GET_TEXT_ID::Q1(array($id));
            $text['published'] = date_format(new DateTime($text['time_edit']), 'd.m.Y H:i');
            return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_blog/tpl/article.tpl'), $text);
        } elseif($tag) {
            $result = '';
            $texts = \DBD\MRECHEL_GET_TEXT_TAG::QQ(array($tag));
            while($row = $texts->next()){
                $row['ago'] = self::time_elapsed_string(strtotime($row['time_edit']));
                $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_blog/tpl/article_bulletin.tpl'), $row);}
            return  $result;
        }
        //new \SYSTEM\LOG\WARNING('No Text found on id: '.$id.' tag: '.$tag);
        $text = \DBD\MRECHEL_GET_TEXT_ID::Q1(array($default));
        return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_blog/tpl/article.tpl'), $text);
        
    }
    public static function get_menu($menu){
        $result = '';
            $texts = \DBD\MRECHEL_GET_TEXT_TAG::QQ(array($menu));
            while($row = $texts->next()){
                $result .= SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_blog/tpl/menu.tpl'), $row);}
            return  $result;
    }

    public function html(){
            $vars = array();
            $vars['blog_menu'] = $this->get_menu('blog_menu');
            $vars['blog_content'] = self::get_content('mrechel_default_blog',$this->tag,$this->id);
            $vars = array_merge($vars,  \SYSTEM\PAGE\text::tag('mrechel'),
                                        \SYSTEM\PAGE\text::tag('webcraft'),
                                        \SYSTEM\PAGE\text::tag('blog'));
            return SYSTEM\PAGE\replace::replaceFile(SYSTEM\SERVERPATH(new PPAGE(),'default_blog/tpl/default_blog.tpl'), $vars);
        }
    }