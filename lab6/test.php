<?php
/**
 * Created by JetBrains PhpStorm.
 * User: stipe
 * Date: 4/16/13
 * Time: 1:55 PM
 * To change this template use File | Settings | File Templates.
 */
define('ROOT', realpath(__DIR__).'/');

require_once('vendor/Slim/Slim/Slim.php');
\Slim\Slim::registerAutoloader(); /* Need to run the Autoloader before JadeView can load */

require_once ROOT . 'vendor/jade.php/src/Jade/Jade.php';
require_once ROOT . "lib/JadeView.php";
echo "<pre>";
print_r(get_declared_classes());
echo "</pre>";
/*Jade\JadeView::$jadeDirectory = ROOT . 'vendor/jade.php/';
Jade\JadeView::$jadeTemplateDirectory = ROOT . 'views/';*/