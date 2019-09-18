<?php
class api_wecker_manufaktur extends \SYSTEM\API\api_system {
    const EMAIL_WEBSITE_CONTACT         = 10;
    const EMAIL_LIST_NEWSLETTER         = 2;
    const EMAIL_NEWSLETTER_SUBSCRIBE    = 20;

    public static function call_send_mail($data){
        $to = 'info@wecker-manufaktur.de';
        $data['json'] = str_replace('\/', '/',json_encode($data,JSON_PRETTY_PRINT));
        \SAI\saimod_mail::contact($data['email'],null,$data['name'],'');
        \SAI\saimod_mail::send_mail($to, self::EMAIL_WEBSITE_CONTACT, null,true,$data,$data['email']);
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    public static function call_send_subscribe($data){ 
        \SAI\saimod_mail::contact($data['email']);
        \SAI\saimod_mail::subscribe($data['email'], self::EMAIL_LIST_NEWSLETTER);
        \SAI\saimod_mail::send_mail($data['email'], self::EMAIL_NEWSLETTER_SUBSCRIBE, self::EMAIL_LIST_NEWSLETTER,true);
        return \SYSTEM\LOG\JsonResult::ok();
    }
}
