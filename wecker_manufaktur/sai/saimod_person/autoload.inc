<?php
require_once dirname(__FILE__).'/sql/autoload.inc';
require_once dirname(__FILE__).'/path/autoload.inc';
\SYSTEM\autoload::registerFolder(dirname(__FILE__),'SAI');
\SYSTEM\SAI\sai::register('\SAI\saimod_person');