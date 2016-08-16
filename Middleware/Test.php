<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/8/3
 * Time: 下午1:38
 */

namespace Middleware;


use Partini\HttpContext\Context;

class Test
{

    public function handle(Context $ctx,$next){
        $ctx->stash('test_add','jjjasdjkjalkdj');
        return $next($ctx);
    }

}