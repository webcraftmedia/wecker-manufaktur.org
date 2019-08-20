<?php
require_once 'index.inc';

echo \SYSTEM\API\api::run(\SYSTEM\API\verify::class,api_demo_basic::class,array_merge($_POST,$_GET));
new \SYSTEM\LOG\COUNTER("API was called sucessfully.");