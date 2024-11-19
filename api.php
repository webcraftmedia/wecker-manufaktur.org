<?php
require_once 'index.inc';

echo \SYSTEM\API\api::run(\SYSTEM\API\verify::class,api_wecker_manufaktur::class,array_merge($_POST,$_GET));
new \SYSTEM\LOG\COUNTER("API was called successfully.");