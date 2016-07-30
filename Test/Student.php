<?php
/**
 * Created by PhpStorm.
 * User: jesusslim
 * Date: 16/7/25
 * Time: 下午10:53
 */

namespace Test;


class Student
{

    protected $id = 0;
    protected $nickname;
    protected $age;
    protected $mobile;

    public function __construct($id,$nickname,$age = 0,$mobile = 123)
    {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->age = $age;
        $this->mobile = $mobile;
    }

    public function __get($k){
        return isset($this->$k) ? $this->$k : null;
    }

    public function __set($k,$v){
        $this->$k = $v;
    }

    public function handle($data,$next){
        $data_new = array_intersect_key($data,array_fill_keys(array('id','nickname','age','mobile'),0));
        foreach ($data_new as $k => $v){
            $this->$k = $v;
        }
        $next($data);
    }

    public function age($id){
        return $this->age+$id;
    }
}