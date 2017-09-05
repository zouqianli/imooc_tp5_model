<?php
namespace app\index\controller;
use app\index\model\User;
class Index
{
    public function index()
    {
        //$this->model_saveAll();//准备数据
    }

    /**
     * saveAll准备数据
     */
    public function model_saveAll()
    {
        $user = model('User');
        $data = [];
        for ($i = 1; $i < 21; $i++)
        {
            $data[] = [
                'name'  =>  '邹前立'."{$i}",
                'email' =>  '1004248149@qq.com_'."{$i}",
                'password'   =>  md5('123456'),
                'num'   =>  100+"{$i}",
                'mygroup' =>  $i%4,
            ];
        }
        $res = $user->saveAll($data);
        dump($res);
    }
}
