<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/7/28
 * Time: 下午10:46
 */
use Home\Controllers\Test;
use Home\Controllers\TestHttpContext;
use Partini\Routes;

Routes::get('test1','test',Test::class);
Routes::get('test2','test2',Test::class);
Routes::get('test3','test3',Test::class);
Routes::get('test4','test4',Test::class);
Routes::get('test5','test5',Test::class);

Routes::get('test6','test6',Test::class)->mid([\Middleware\Auth::class,\Middleware\Test::class]);

Routes::get('/','index',TestHttpContext::class);
Routes::get('cookie/get','cookie',TestHttpContext::class);
Routes::get('cookie/set','setCookie',TestHttpContext::class);
Routes::get('session/set','setSession',TestHttpContext::class)->mid([\Partini\MiddleWare\Session::class]);
Routes::get('session/get','session',TestHttpContext::class)->mid([\Partini\MiddleWare\Session::class]);

Routes::group(
    ['mid5','mid6'],
    function(){
        Routes::group(
            ['mid1','mid2'],
            function(){
                Routes::get('/m1','index','C1');
                Routes::get('/m2','index','C1');
                Routes::get('/m3','index','C1')->mid(['mid4']);
            }
        );
    }
);
