<?php
\SYSTEM\autoload::registerFolder(dirname(__FILE__));
\SYSTEM\FILES\files::registerFolder(dirname(__FILE__).'/img/','img','*.*');
\SYSTEM\FILES\files::registerFolder(dirname(__FILE__).'/persons/','persons','*.*');
\SYSTEM\FILES\files::registerFolder(dirname(__FILE__).'/projects/','projects','*.*');