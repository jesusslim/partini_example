<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/7/27
 * Time: 下午11:54
 */

namespace Home\Controllers;


use Partini\HttpContext\Controller;

class Test extends Controller
{

    //test for redirect
    public function test(){
        return $this->ctx()->redirect('http://www.google.com');
    }

    //test for inject Request
    public function test2(){
        return $this->json(array(
            'status' => 1,
            'data' => "Param id is ".$this->context->input()->get('id')
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
        $r = $db->query('select * from ebk_students where id = 10017');
        return $this->json($r);
    }

    //test for middleware
    public function test6(){
        return "reach & the test_add is ".$this->context->getStash('test_add');
    }
}