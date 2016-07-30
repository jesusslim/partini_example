<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/7/29
 * Time: 下午2:57
 */

namespace Middleware;


use Partini\ApplicationInterface;
use Partini\Http\Request;

class Auth
{

    protected $context;

    public function __construct(ApplicationInterface $context)
    {
        $this->context = $context;
    }

    public function handle(Request $request,$next){
        $auth = $this->context->getConfig('AUTH_KEY');
        if($request->get('token') !== $auth){
            return 'Token err';
        }else{
            return $next($request);
        }
    }

}