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
     *
     * 2.在模型类中添加保护属性protected $AutoWriteTimestamp = true;
     *  INSERT INTO `tp5_user` (`name` , `password` , `create_time` , `update_time`) VALUES ('时间戳' , 'e10adc3949ba59abbe56e057f20f883e' , 1504671731 , 1504671731)
     *
     * 3.表中字段(create_at|update_at)和默认字段(create_time|update_time)不一致,模型类中设置
     * protected $autoWriteTimestamp = true;
     * protected $createTime = 'create_at';
     * protected $updateTime = 'update_at';
     * INSERT INTO `tp5_user` (`name` , `password` , `create_at` , `update_at`) VALUES ('时间戳' , 'e10adc3949ba59abbe56e057f20f883e' , 1504672339 , 1504672339)
     */
    public function model_create()
    {
        $res = User::create([
            'name'  =>  '时间戳',
            'password'  =>  md5('123456'),
            // 没有显示添加时间戳字段
        ]);
        dump($res);
    }
}
