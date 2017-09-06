<?php
namespace app\index\controller;
use app\index\model\User;
class Index
{
    public function index()
    {
        $this->model_create();
    }

    /**
     * 1.修改配置文件 不推荐(全局有效,如果有的表没有时间戳字段报错)
     * 自动写入时间戳字段(添加时间|更新时间)
     * 'auto_timestamp'  => true,
     * 添加一条记录
     * INSERT INTO `tp5_user` (`name` , `password` , `create_time` , `update_time`) VALUES ('时间戳' , 'e10adc3949ba59abbe56e057f20f883e' , 1504671179 , 1504671179)
     */
    public function model_create()
    {
        $res = User::create([
            'name'  =>  '时间戳',
            'password'  =>  md5('123456'),
            // 没有显示添加时间戳字段
        ]);
    }
}
