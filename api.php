<?php
require_once 'lib/autoload.inc';                                                //SYSTEM Classes
require_once 'demo_basic/autoload.inc';                                         //Project Classes
require_once '/home/web/web/config/get_config.php';

\SYSTEM\system::start(\WEBCRAFT\get_config(dirname(__FILE__)));

echo \SYSTEM\API\api::run('\SYSTEM\API\verify','api_demo_basic',array_merge($_POST,$_GET));
new \SYSTEM\LOG\COUNTER("API was called sucessfully.");