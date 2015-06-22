<?php

if (version_compare(PHP_VERSION, '5.3.0') < 0) {
    exit("Sorry, this version of jRotator will only run on PHP version 5.3 or greater!\n");
}

require_once 'config.php';
require_once 'Slim/Slim.php';

function urlFor($name, $params = array(), $appName = 'default')
{
    return \Slim\Slim::getInstance($appName)->urlFor($name, $params);
}

session_start();

\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->hook('slim.before.dispatch', function () use ($app) {
    global $siteName, $bannerAd;
    global $googleAnalyticsId;
    $address = null;

    $flash = $app->view()->getData('flash');

    $app->view()->setData('siteName', $siteName);
    $app->view()->setData('bannerAd', $bannerAd);
    $app->view()->setData('googleAnalyticsId', $googleAnalyticsId);
});

$app->get("/", function () use ($app) {
    global $faucetList;
    $id = $app->request()->get('id');
    if (!is_null($id) && is_numeric($id)) {
        if (($id) > count($faucetList)) {
            $app->redirect($app->urlFor('root'));
        } elseif (($id) < 1) {
            $app->redirect($app->urlFor('root'));
        }
        $app->view()->setData('faucetName', $faucetList[($id - 1)][0]);
        $app->view()->setData('faucetUrl', $faucetList[($id - 1)][1]);
        $app->view()->setData('faucetId', $id);
    }
    
    $app->view()->setData('faucetList', $faucetList);
    
    $app->render('main.php');
})->name('root');

$app->get('/(:segments+)', function ($segments) use ($app) {
    $app->redirect($app->urlFor('root'));
})->name('catchall');

$app->run();