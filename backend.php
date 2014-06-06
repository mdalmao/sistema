<?php

$yii=dirname(__FILE__).'/../../yii/framework/yii.php';
$config=dirname(__FILE__).'/backend/config/main.php';
require_once($yii);
Yii::setPathOfAlias('common', dirname(__FILE__).DIRECTORY_SEPARATOR.'common');
Yii::createWebApplication($config)->run();