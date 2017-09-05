<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\User;
class Index extends Controller
{
    public function index()
    {
        $this->model_count();
        $this->model_sum('num');
        $this->model_max('num');
        $this->model_min('num');
        $this->model_avg('num');

        $this->model_static();

        //$this->model_saveAll();
    }

    #都可以使用where
    /**
     * 记录数
     */
    public function model_count()
    {
        $user = new User();
        $res = $user->where('id','<','3')->count();
        dump($res);
    }

    /**
     * 和
     * @param string $field 求和的字段
     */
    public function model_sum($field='')
    {
        $user = new User();
        $res = $user->sum($field);
        dump($res);
    }

    /**
     * 最大值
     * @param string $field 最大值字段
     */
    public function model_max($field='')
    {
        $user = new User();
        $res = $user->max($field);
        dump($res);
    }

    /**
     * 最小值
     * @param string $field 最小值字段
     */
    public function model_min($field='')
    {
        $user = new User();
        $res = $user->min($field);
        dump($res);
    }

    /**
     * 平均值
     * @param string $field 平均值字段
     */
    public function model_avg($field='')
    {
        $user = new User();
        $res = $user->avg($field);
        dump($res);
    }

    #静态方式调用
    #警告:非静态方法不要使用静态方式调用
    public function model_static()
    {
        $res = User::where('id','<','3')->count();
        dump($res);
        $res = User::sum('num');
        dump($res);
        $res = User::max('num');
        dump($res);
        $res = User::min('num');
        dump($res);
        $res = User::avg('num');
        dump($res);
    }

    /**
     * 数据准备
     */
    public function model_saveAll()
    {
        $user = new User();
        $data = [];
        for($i=1;$i<21;$i++)
        {
            $data[] = [
                'name'  =>  '邹前立'."{$i}",
                'email' =>  '1004248149@qq.com'."{$i}",
                'password'  =>  md5('123456'),
                'num'   =>  '100'+"{$i}",
                'mygroup' =>  $i%4,
            ];
        }
        $res = $user->saveAll($data);
        dump($res);
    }
}
