<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/7/29
 * Time: 下午2:57
 */

namespace Middleware;


use Partini\ApplicationInterface;
use Partini\HttpContext\Context;

class Auth
{

    protected $context;

    public function __construct(ApplicationInterface $context)
    {
        $this->context = $context;
    }

    public function handle(Context $ctx,$next){
        $auth = $this->context->getConfig('AUTH_KEY');
        if($ctx->input()->get('token') !== $auth){
            return 'Token err';
        }else{
            return $next($ctx);
        }
    }

}