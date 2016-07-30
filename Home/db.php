<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/7/29
 * Time: 上午9:07
 */

return array(
    //redis
    'REDIS_HOST' => '127.0.0.1',
    'REDIS_PORT' => '6379',
    'REDIS_TIMEOUT' => '300',
    'REDIS_PREFIX' => 'Partini_',

    //db
    'DB_HOST' => '127.0.0.1',
    'DB_USER' => 'test',
    'DB_PWD' => 'jesusslim',
    'DB_PORT' => '3306',
    'DB_NAME' => 'partini',
    'DB_PREFIX' => 'pt_',

    //for the example of auth in middleware
    'AUTH_KEY' => '123'
);