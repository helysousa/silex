<?php
/**
 * Created by PhpStorm.
 * User: Hely
 * Date: 3/13/2016
 * Time: 11:21 PM
 */

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup,
	Doctrine\ORM\EntityManager,
	Doctrine\Common\EventManager,
	Doctrine\ORM\Events,
	Doctrine\ORM\Configuration,
	Doctrine\ORM\Mapping\Driver,
	Doctrine\Common\Cache\ArrayCache as Cache,
	Doctrine\Common\Annotations\AnnotationRegistry,
	Doctrine\Common\Annotations\AnnotationReader,
	Doctrine\Common\ClassLoader;


// Silex application

$app = new \Silex\Application();

// twig
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => array(__DIR__ .  DIRECTORY_SEPARATOR. 'views', 
    	__DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Code' . DIRECTORY_SEPARATOR . 'Sistema' . DIRECTORY_SEPARATOR . 'Views')
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());


// doctrine
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__. DIRECTORY_SEPARATOR.'database' . DIRECTORY_SEPARATOR . 'database.db',
    ),
));

// habilita debug
$app["debug"] = true;