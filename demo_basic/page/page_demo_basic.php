<?php
class page_demo_basic extends \SYSTEM\API\api_default {
    public static function get_apigroup(){
        return 1;}
    public static function get_class($params = null){
        return self::class;}      
        
    public static function default_page($_escaped_fragment_ = null){
        return (new default_page())->html($_escaped_fragment_);}
    
    public static function page_start($tag = null, $id = null){
        return (new default_start($tag,$id))->html();}
    
    public static function page_blog($tag = null, $id = null){
        return (new default_blog($tag,$id))->html();}
    
    public static function page_impressum(){
        return (new default_impressum(''))->html();}
}