<?php
namespace app\index\controller;
use app\index\model\User;
class Index
{
    public function index()
    {
        $this->model_getFieldAttr(2);
    }
    /**
     * 1.获取字段值
     * 没有设置获取器--输出数据库表中的值
     * 设置获取器--根据表中的值输出模型中获取器对应case的值
     */
    public function model_getFieldAttr($key='1')
    {
        $user = User::get($key);
        echo $res = $user->sex;
        echo "<hr>";
        dump($user->toArray());//获取器sex:女
        echo "<hr>";
        dump($user->getData());//原始数据sex:1
    }
}
