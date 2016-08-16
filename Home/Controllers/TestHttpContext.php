<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/8/3
 * Time: 下午10:01
 */

namespace Home\Controllers;


use Partini\Application;
use Partini\HttpContext\Controller;
use Partini\MiddleWare\Session;

class TestHttpContext extends Controller
{

    public function index(){
        $this->ctx()->output()->body(Application::getInstance()->getConfig('DB_HOST'));
    }

    public function cookie(){
        $this->ctx()->output()->body("the cookie test is ".$this->ctx()->getCookie('test2'));
    }

    public function setCookie(){
        $this->ctx()->setCookie('test2','hhhh2',1*60);
        return "ok";
    }

    public function setSession(){
        $_SESSION['slimik'] = 'gxg';
        return 'ok';
    }

    public function session(){
        return $_SESSION['slimik'];
    }
}