<?php
namespace app\index\controller;
use think\Db;
use app\index\model\User;
use think\Loader;
class Index
{
    public function index()
    {
//        $this->model_instance1();
//        $this->model_instance2();
//        $this->model_instance3();
        $this->model_instance4();
    }

    /**
     * 模型实例化1
     * User模型只需要继承think\Model
     * use app\index\model\User;(推荐:清楚使用了哪个模型)
     * User::get(key)静态调用
     * 1 直接调用User类继承的静态方法get,根据对应主键获取数据
     */
    public function model_instance1()
    {
        $res = User::get(1);    // 返回 对象 不方便查看数据
        $res = $res->toArray();      // 转换为数组形式
        dump($res);
    }

    /**
     * 模型实例化2
     * use app\index\model\User;
     * 2 new 实例化模型后,调用静态方法get获取数据
     */
    public function model_instance2()
    {
        $user = new User();
        $res = $user::get(3);
        $res = $res->toArray();
        dump($res);
    }

    /**
     * 模型实例化3
     * 3 use think\Loader加载模型(单例)
     * 减少use引入其他模型--多个模型可能会整晕
     */
    public function model_instance3()
    {
        $user = Loader::model('User');
        $res = $user::get(5);
        $res = $res->toArray();
        dump($res);
    }

    /**
     * 模型实例化4
     * 4 model助手函数
     * 不需要use app\index\model\User;
     * 也不需要use think\Loader;
     */
    public function model_instance4()
    {
        $user = model('User');
        $res = $user::get(8);
        $res = $res->toArray();
        dump($res);
    }
}
