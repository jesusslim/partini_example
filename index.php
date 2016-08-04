<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/7/25
 * Time: 下午5:37
 */

require "Lib/Vendor/autoload.php";
require_once("Middleware/Auth.php");
require_once("Middleware/Test.php");
require_once("Home/Controllers/Test.php");
require_once("Home/Controllers/TestHttpContext.php");

use Partini\Application;
use Partini\ExceptionHandler;

//test new

//end

$app = new Application();
//load config
$app->addConfig(require('Home/config.php'));
//exception handler
$e_h = new ExceptionHandler($app);
//map cache handler
$app->mapSingleton('cache',\Partini\Cache\Redis::class);
//map db handler
$app->mapSingleton('db',\Partini\Db\Mysqli::class);
//init router
//$app->mapSingleton(\Partini\HttpContext\Context::class,\Partini\HttpContext\Context::class);
$router = new \Partini\Router\Router($app);
$app->mapData('router',$router);
require('Home/routes.php');
//run web app
$router->handle();

//run use coroutine
//require_once("Lib/Vendor/jesusslim/partini/Partini/Coroutine/Task.php");
//require_once("Lib/Vendor/jesusslim/partini/Partini/Coroutine/Signal.php");
//require_once("Lib/Vendor/jesusslim/partini/Partini/Coroutine/Scheduler.php");
//
//$gen = $router->handleUseCoroutine();
//$task = new \Coroutine\Task($gen,$app);
//$task->run();

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