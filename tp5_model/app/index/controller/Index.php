<?php
namespace app\index\controller;
use app\index\model\User;
class Index
{
    public function index()
    {
        $this->model_destroy();
        $this->model_destroy2();
        $this->model_destroy3();
        $this->model_delete();
        $this->model_delete3();
    }
    #destroy 会获取数据,然后删除
    /**
     * 1 destroy
     * 传入一个id
     * 成功返回1
     * SELECT * FROM `tp5_user` WHERE `id` = 18
     * DELETE FROM `tp5_user` WHERE `id` = 18
     */
    public function model_destroy()
    {
        $res = User::destroy(18);
        dump($res);
    }
    /**
     * 1.2 destroy
     * 传入一个array
     * 成功返回1
     * SELECT * FROM `tp5_user` WHERE `id` = 17
     * DELETE FROM `tp5_user` WHERE `id` = 17
     */
    public function model_destroy2()
    {
        $res = User::destroy([
            'id'=>'17',
        ]);
        dump($res);
    }
    /**
     * 1.3 destroy
     * 传入一个 闭包
     * 成功返回删除的记录条数
     * SELECT * FROM `tp5_user` WHERE `id` > 15
     * DELETE FROM `tp5_user` WHERE `id` = 16
     * DELETE FROM `tp5_user` WHERE `id` = 17
     */
    public function model_destroy3()
    {
        $res = User::destroy(function ($query){
            $query->where('id','GT','15');
        });
        dump($res);
    }

    #先获取数据 ,然后删除

    /**
     * 2 获取模型 delete
     * 成功返回1
     * SELECT * FROM `tp5_user` WHERE `id` = 11
     * DELETE FROM `tp5_user` WHERE `id` = 1
     */
    public function model_delete()
    {
        $user = User::get(11);
        $res = $user->delete();
        dump($res);
    }

    /**
     * 2.2 获取模型 where delete
     * 成功返回1
     * DELETE FROM `tp5_user` WHERE `id` = 12
     */
    public function model_delete2()
    {
        $user = new User();
        $res = $user->where('id','12')
            ->delete();
        dump($res);
    }
    /**
     * 2.3 获取模型 where delete
     * 成功返回删除的记录条数
     * 删除所有数据(一般使用软删除|给一个表示状态字段)
     * DELETE FROM `tp5_user` WHERE ( 1=1 )
     */
    public function model_delete3()
    {
        $user = new User();
        $res = $user->where('1=1')
            ->delete();
        dump($res);
    }
}
