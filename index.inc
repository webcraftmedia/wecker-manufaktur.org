<?php
require_once 'lib/autoload.inc';                                                //SYSTEM Classes
require_once 'demo_basic/autoload.inc';                                         //Project Classes
require_once 'config.php';

// Start SYSTEM
\SYSTEM\system::start(\WEBCRAFT\config(dirname(__FILE__)));