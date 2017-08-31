<?php
namespace app\index\controller;
use app\index\model\User;
class Index
{
    public function index()
    {
//        $this->model_create();
//        $this->model_create2();
//        $this->model_create3();
//        $this->model_create4();

//        $this->model_save();
//        $this->model_save2();
//        $this->model_save3();
//        $this->model_save4();
//        $this->model_save5();
//        $this->model_save6();

//        $this->model_saveAll();
//        $this->model_saveAll2();
//        $this->model_save7();
    }
    ####################### 静态方法 create 插入一条数据 #########
    /**
     * 1 静态方法 create 添加一条数据
     * 返回自增id--一定要和表中的主键字段对应:如user_id,用$user->user_id;
     * 默认:插入不存在字段,会报错:数据表字段不存在:[XXX],数据库也不会插入数据
     *      过滤不存在字段:可以传入第二个参数true,插入数据成功
     *      插入指定字段:allowFields('字段,字段')
     * 返回模型对象
     */
    public function model_create()
    {
        $user = User::create([
            'name'  =>  '邹前立',
            'password'  =>  md5('zouqianli'),
            'email' =>  '1004248149@qq.com',
            'num'   =>  10,
            'mygroup'   =>  5,
        ]);
        dump($user->id);
        dump($user);
    }
    /**
     * 1 静态方法 create 添加一条数据
     * 默认:插入不存在字段,会报错:数据表字段不存在:[XXX],数据库也不会插入数据
     * 返回模型对象
     */
    public function model_create2()
    {
        $user = User::create([
            'name'  =>  '邹前立',
            'password'  =>  md5('zouqianli'),
            'email' =>  '1004248149@qq.com',
            'num'   =>  0,
            'mygroup'   =>  0,
            'XXX'   =>  'xxx',//不存在字段
        ]);
        dump($user->id);
        dump($user);
    }
    /**
     * 1 静态方法 create 添加一条数据
     *   过滤不存在字段:可以传入第二个参数true,插入数据成功
     * 返回模型对象
     */
    public function model_create3()
    {
        $user = User::create([
            'name'  =>  '邹前立',
            'password'  =>  md5('zouqianli'),
            'email' =>  '1004248149@qq.com',
            'num'   =>  0,
            'mygroup'   =>  0,
            'XXX'   =>  'xxx',//不存在字段
        ],true);
        dump($user->id);
        dump($user);
    }
    /**
     * 1 静态方法 create 添加一条数据
     * 插入指定字段:数组['name', 'email']
     * 返回模型对象
     */
    public function model_create4()
    {
        $user = User::create([
            'name'  =>  '邹前立',
            'password'  =>  md5('zouqianli'),
            'email' =>  '1004248149@qq.com',
            'num'   =>  10,//数据库设置的默认值0
            'mygroup'   =>  5,//数据库设置的默认值0
        ],['name', 'email']);//只会插入name , email
        dump($user->id);
        dump($user);
    }

    ####################### save 插入一条数据 #####################

    /**
     * 2 save 插入一条数据
     * 实例化后赋值属性
     * 返回模型对象
     */
    public function model_save()
    {
        $user = new User();
        $user->name = 'zz';
        $user->email = '1096@qq.com';
        $user->save();
        dump($user->id);//自增id
        dump($user);
    }
    /**
     * 2 save 插入一条数据
     * 实例化后,save方法传入数组
     * 返回模型对象
     */
    public function model_save2()
    {
        $user = new User;
        $res = $user->save([
            'name'  =>  'ds',
            'email' =>  '1004@qq.com',
            'password'  => md5('123'),
        ]);

        dump($user->id);//自增id
        dump($user);
    }
    /**
     * 2 save 插入一条数据
     * 实例化时传入数组数据
     * 返回模型对象
     */
    public function model_save3()
    {
        $user = new User([
            'name'  =>  'ds2',
            'email' =>  '10042@qq.com',
            'password'  => md5('222'),
        ]);
        $res = $user->save();

        dump($user->id);//自增id
        dump($user);
    }
    /**
     * 2 save 插入一条数据
     * data方法批量赋值
     * 返回模型对象
     */
    public function model_save4()
    {
        $user = new User();
        $user->data([
            'name'  =>  'ds2',
            'email' =>  '10042@qq.com',
            'password'  => md5('222'),
        ]);
        $res = $user->save();

        dump($user->id);//自增id
        dump($res); // 1:插入成功
    }
    /**
     * 2 save 插入一条数据
     * 过滤非数据表字段的数据--allowField(true)
     * 返回模型对象
     */
    public function model_save5()
    {
        $user = new User();
        $user->data([
            'name'  =>  'ds2',
            'email' =>  '10042@qq.com',
            'password'  => md5('222'),
            'XXX'   =>  'xxx',
        ]);
        $res = $user->allowField(true)->save();

        dump($user->id);//自增id
        dump($res); // 1:插入成功
    }
    /**
     * 2 save 插入一条数据
     * 指定某些字段写入
     * 返回模型对象
     */
    public function model_save6()
    {
        $user = new User();
        $user->data([
            'name'  =>  'ds2',
            'email' =>  '10042@qq.com',
            'password'  => md5('222'),
        ]);
        $res = $user->allowField('name,email')->save();

        dump($user->id);//自增id
        dump($res); // 1:插入成功
    }

    ####################### saveAll 插入多条数据 ##################

    /**
     * saveAll 插入多条数据
     * 返回模型对象数组
     * 批量保存数据
     */
    public function model_saveAll()
    {
        $user = new User;
        // saveAll返回模型对象数组,可以遍历
        $res = $user->saveAll([
            [
                'name'  =>  'item1',
                'email' =>  '123@qq.com',
            ],
            [
                'name'  =>  'item2',
                'email' =>  '222@qq.com',
            ]
        ]);
        // 查看添加的数据
        foreach ($res as $data)
        {
            //dump($data->id);
            dump($data->toArray());
        }
        dump($res);
    }
    /**
     * saveAll 更新多条数据
     * 批量保存数据,带自增id
     */
    public function model_saveAll2()
    {
        $user = new User;
        // saveAll返回模型对象数组,可以遍历
        $res = $user->saveAll([
            [
                'id'    => '1',
                'name'  =>  'item1',
                'email' =>  '111_1@qq.com',
            ],
            [
                'id'    =>  '2',
                'name'  =>  'item2',
                'email' =>  '222_2@qq.com',
            ]
        ]);
        dump($res);
    }
    /**
     * save 遍历批量新增数据
     * 返回模型对象数组
     */
    public function model_save7()
    {
        $user = new User;
        $list = [
            [
                'name'  =>  'item1',
                'email' =>  '111_1@qq.com',
            ],
            [
                'name'  =>  'item2',
                'email' =>  '222_2@qq.com',
            ]
        ];
        $res = '';
        foreach ($list as $data)
        {
            $res = $user->data($data,true)
                ->isUpdate(false) // 非更新
                ->save();
        }
        dump($res);
    }
}
