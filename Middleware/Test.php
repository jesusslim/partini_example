<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/8/3
 * Time: 下午1:38
 */

namespace Middleware;


use Partini\Http\Request;

class Test
{

    public function handle(Request $req,$next){
        $req->set('test_add','jjjasdjkjalkdj');
        return $next($req);
    }

}