<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/13/2016
 * Time: 11:21 PM
 */

require_once 'vendor/autoload.php';

$app = new \Silex\Application();

// habilita debug
$app["debug"] = true;