<?php

error_reporting(E_ALL);

try {

define('BASE_DIR', dirname(__DIR__));
define('APP_DIR', BASE_DIR . '/app');

require APP_DIR . '/controllers/ControllerBase.php';


$loader = new \Phalcon\Loader();
    $loader->registerDirs(
        array(
        	APP_DIR . '/controllers',
        	APP_DIR . '/models',
        )
    )->register();


$di = new Phalcon\DI\FactoryDefault();

$di->set('db', function () {
	return new Phalcon\Db\Adapter\Pdo\Mysql(array(
		'host' => '127.0.0.1',
    'username' => 'wikibe',
    'password' => 'wiK18e_@2581',
		'dbname' => 'wikibe'
	));
});

$di->set('view', function() use ($config){
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir(APP_DIR . '/views');
        return $view;
    });

$di->set('url', function () {
    $url = new UrlResolver();
    $url->setBaseUri('/wiki_cms/');
    return $url;
}, true);

$application = new \Phalcon\Mvc\Application($di);

echo $application->handle()->getContent();

}catch (Exception $e) {
	echo $e->getMessage();
}
