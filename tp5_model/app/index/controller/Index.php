<?php
namespace app\index\controller;
use app\index\model\User;
class Index
{
    public function index()
    {
//        $this->model_create();
//        $this->model_softDelete();
//        $this->model_softDestroy();
//        $this->model_softSelect();
    }
/** 软删除 */
    /**
     * 类方法 destroy
     *
     * 模型类 use traits\model\SoftDelete;
     * use SoftDelete;
     * 默认delete_time字段为int(null)
     *
     * SELECT * FROM `tp5_user` WHERE `id` = 2
     * 表中执行了更新操作
     * UPDATE `tp5_user` SET `delete_time`=1504674082,`update_at`=1504674082 WHERE `id` = 2
     */
    public function model_softDestroy()
    {
        $res = User::destroy(2);//软删除
        //$res = User::destroy(2,true);//真实删除
        dump($res);
    }

    /**
     * 对象方法 delete
     * delete_time字段允许为空,不然报错
     *
     * 模型类 use traits\model\SoftDelete;
     * use SoftDelete;
     * 默认delete_time字段为int(null)
     *
     * SELECT * FROM `tp5_user` WHERE ( `id` = 3 ) AND `tp5_user`.`delete_time` IS NULL LIMIT 1
     * UPDATE `tp5_user` SET `delete_time`=1504675389,`update_at`=1504675389 WHERE `id` = 3
     */
    public function model_softDelete()
    {
        $user = User::get(3);
        $res = $user->delete(); //软删除
//        $res = $user->delete(true);//真实删除
        dump($res);
    }

    /**
     * 使用软删除后的查询
     * 默认情况下查询的数据不包含软删除数据
     * 如果需要包含软删除的数据
     * User::withTrashed()->find();
     * User::withTrashed()->select();
     * 如果只查询软删除的数据
     * User::onlyTrashed()->find();
     * User::onlyTrashed()->select();
     */
    public function model_softSelect()
    {
        $res = User::onlyTrashed()->find();
//        $res = User::onlyTrashed()->select();
        dump($res->toArray());
    }

/** 自动完成 */
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
     *
     * 4.关闭部分自动写入添加|更新时间,模型类中设置
     * protected $autoWriteTimestamp = true;
     * protected $createTime = false;//不关心
     * protected $updateTime = 'update_at';
     * INSERT INTO `tp5_user` (`name` , `password` , `update_at`) VALUES ('时间戳' , 'e10adc3949ba59abbe56e057f20f883e' , 1504672577)
     *
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
