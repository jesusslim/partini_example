<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/7/25
 * Time: 下午5:37
 */

require "Lib/Vendor/autoload.php";
require_once("Middleware/Auth.php");
require_once("Lib/Vendor/Utils/EasyMysql.php");
require_once("Home/Controllers/Test.php");

use Partini\Application;
use Partini\ExceptionHandler;

$app = new Application();
//load config
$app->addConfig(require('Home/config.php'));
//exception handler
$e_h = new ExceptionHandler($app);
//map cache handler
$app->map('cache',\Cache\Redis::class);
//map db handler
$app->map('db',\Db\Mysqli::class);
//init router
$router = new \Partini\Router\Router($app);
$app->mapData('router',$router);
require('Home/routes.php');
//run web app
$router->handle();


/***** Example of inject chains *****/

//$chains = new Chains($app);
//dump($app->produce(Student::class));
//$chains->chain(RequestHandler::class)
//    ->chain(function($data,$next){
//        $r = Auth::checkToken($data['token']);
//        if($r !== true){
//            dump("Token wrong");
//        }else{
//            $next($data);
//        }
//    })->chain(Student::class)
//    ->chain(function($data){
//        dump($data);
//    })->run();

/***** Example of inject & call *****/

//dump($app->produce(Student::class));
//
//$app->call(function(Student $student,$a = 111,$b = 222){$student->id += $a;$student->mobile = $b;dump($student);},array('b' => 45));
//
//dump($app->callInClass(Student::class,'age',array('id' => 12)));