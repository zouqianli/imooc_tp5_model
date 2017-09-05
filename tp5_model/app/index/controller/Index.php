<?php
namespace app\index\controller;
use app\index\model\User;
class Index
{
    public function index()
    {
//        $this->model_update();
//        $this->model_update2();
//        $this->model_update3();
//        $this->model_update4();
//        $this->model_update5();
//        $this->model_update6();
        $this->model_update7();
        //$this->model_saveAll();//准备数据
    }

    /**
     * 1 update 传入数组 有id 不推荐使用
     * 返回User对象
     * UPDATE `tp5_user` SET `email`='1096187119' WHERE ( `id` = 1 )
     */
    public function model_update()
    {
        $res = User::update([
            'id' =>  1,
            'email'  =>  '1096187119@qq.com',
        ]);
        dump($res);
    }
    /**
     * 1.2 update 传入数组 没有id--需要第二个参数:数组 不推荐使用
     * 返回User对象
     * UPDATE `tp5_user` SET `email`='1096187119' WHERE ( `id` = 2 )
     */
    public function model_update2()
    {
        $res = User::update([
            'email'  =>  '1096187119@qq.com',
        ],[
            'id'    =>  '2',
        ]);
        dump($res);
    }
    /**
     * 1.3 update 传入数组 第二个参数:闭包函数--构造where条件 不推荐使用
     * 返回User对象
     * UPDATE `tp5_user` SET `email`='1096187119' WHERE ( `id` < 5 )
     */
    public function model_update3()
    {
        $res = User::update([
            'email' =>  '1096187119',
        ],function ($query){
            $query->where('id',"LT",'5');
        });
        dump($res);
    }

    /**
     * 2 update & where 推荐
     * 返回更新的记录条数 // 6 没有更新返回0
     * UPDATE `tp5_user` SET `email`='1096187119@qq.com' WHERE `id` < 7
     */
    public function model_update4()
    {
        $res = User::where('id','LT','7')
            ->update([
                'email' =>  '1096187119@qq.com',
            ]);
        dump($res);
    }

    /**
     * 3 get到对象 推荐
     * 赋值属性--魔术方法 __set()
     * SELECT * FROM `tp5_user` WHERE `id` = 1 LIMIT 1
     * save()更新已经存在的记录
     */
    public function model_update5()
    {
        //SELECT * FROM `tp5_user` WHERE `id` = 1 LIMIT 1
        $user = User::get(1);
        $user->name = 'zou';
        $user->email = '222@qq.com';
        $res = $user->save();
        dump($res);
    }
    /**
     * 3.2 new User()对象 推荐
     *  UPDATE `tp5_user` SET `name`='zz' WHERE ( `id` = 9 )
     * save()更新已经存在的记录
     */
    public function model_update6()
    {
        $user = new User();
        $res = $user->save([
            'name'  =>  'zz',
        ],function ($query){
            $query->where('id','EQ','9');
        });
        dump($res);
    }
    /**
     * 3.3 new User()对象 不推荐
     *  UPDATE `tp5_user` SET `name`='zz' WHERE ( `id` = 9 )
     * saveAll()更新多条已经存在的记录
     * UPDATE `tp5_user` SET `email`='11@qq.com' WHERE `id` = 11
     * UPDATE `tp5_user` SET `email`='11@qq.com' WHERE `id` = 12
     */
    public function model_update7()
    {
        $user = new User();
        // 此处使用save更新多条记录会报错:数据表字段不存在:[0]
        $res = $user->saveAll([
            ['id'=>'11','email'=>'11@qq.com'],
            ['id'=>'12','email'=>'22@qq.com'],
        ]);
        dump($res);
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
