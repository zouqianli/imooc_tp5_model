<?php
namespace app\index\controller;
use app\index\model\User;
class Index
{
    public function index()
    {
        $this->mode_setFiledAttr();
    }

    /**
     * 修改器
     * 不使用:和普通添加数据一样
     * 使用:对值进行处理,然后插入表
     */
    public function mode_setFiledAttr()
    {
        $res = User::create([
            'name'  =>  '作用修改器',
            'email' =>  '666@qq.com',
            'sex'   =>  '2',
            'password'  => '123456',
            'mygroup'   =>  1,
            'num'   =>  10,
        ]);
    }
}
