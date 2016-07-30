<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/7/27
 * Time: 下午11:54
 */

namespace Home\Controllers;


use Partini\Http\Controller;
use Partini\Http\Request;

class Test extends Controller
{

    //test for redirect
    public function test(){
        return $this->redirect('http://www.google.com');
    }

    //test for inject Request
    public function test2(Request $req){
        return $this->json(array(
            'status' => 1,
            'data' => "Param id is ".$req->get('id')
        ));
    }

    //test for read config
    public function test3($config){
        return "123".$config->get('HELLO');
    }

    //test for cache
    public function test4($cache){
        $r = $cache->get('test4');
        return "hello".$r;
    }

    //test for db
    public function test5($db){
        $r = $db->query('select * from pt_students where id = 12345');
        return $this->json($r);
    }

    //test for middleware
    public function test6(){
        return "reach";
    }
}