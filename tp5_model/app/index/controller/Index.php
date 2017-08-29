<?php
namespace app\index\controller;
use think\Db;
use app\index\model\User;
class Index
{
    public function index()
    {
        $this->getById(1);
        $this->getByArray(['id'=>1]);
        $this->getWithClosure();
        $this->findOne();

        $this->allById('1,2,3');
        $this->allByArray([1,2,3]);
        $this->allByClousre();
        $this->selectAll();

        $this->model_value();
        $this->model_column();
    }

    /********** 获取一条数据 get|find *******/
    /**
     * get 传入id 获取一条记录
     * @param $id
     * SELECT * FROM `tp5_user` WHERE `id` = 1 LIMIT 1
     */
    public function getById($id)
    {
        $user = User::get($id);
        $res = $user->toArray();
        dump($res);
    }

    /**
     * get 传入数组 获取一条记录
     * @param array $data
     * SELECT * FROM `tp5_user` WHERE `id` = 1 LIMIT 1
     */
    public function getByArray($data=[])
    {
        $user = User::get($data);
        $res = $user->toArray();
        dump($res);
    }

    /**
     * get 传入闭包 获取一条记录
     * 支持链式操作
     * SELECT `id`,`name` FROM `tp5_user` WHERE `id` = 1 LIMIT 1
     */
    public function getWithClosure()
    {
        $user = User::get(function ($query){
            $query->where('id','EQ',1)
                ->field('id,name');
        });
        $res = $user->toArray();
        dump($res);
    }

    /**
     * find & where 获取一条数据
     * SELECT `name`,`email` FROM `tp5_user` WHERE `id` = 1 LIMIT 1
     */
    public function findOne()
    {
        $user = User::where("id", "EQ", "1")
            ->field("name, email")
            ->find();
        $res = $user->toArray();
        dump($res);
    }

    /********** 获取多条数据 all|select *******/

    /**
     * all 传入多个id 获取多条数据
     * @param $idStr
     * SELECT * FROM `tp5_user` WHERE `id` IN (1,2,3)
     */
    public function allById($idStr)
    {
        // all()方法返回数组(包含多个对象)
        $users = User::all($idStr);
        // 遍历数据
        foreach ($users as $userObj)
        {
            dump($userObj->toArray());
        }
    }

    /**
     * all 传入数组 获取多条数据
     * @param $data
     * SELECT * FROM `tp5_user` WHERE `id` IN (1,2,3)
     */
    public function allByArray($data=[])
    {
        // all()方法返回数组(包含多个对象)
        $users = User::all($data);
        // 遍历数据
        foreach ($users as $userObj)
        {
            dump($userObj->toArray());
        }
    }

    /**
     * all 传入闭包 获取多条数据
     * SELECT * FROM `tp5_user` WHERE `id` IN (1,2,3)
     */
    public function allByClousre()
    {
        // all()方法返回数组(包含多个对象)
        $users = User::all(function ($query){
            $query->where('id','IN','1,2,3');
        });
        // 遍历数据
        foreach ($users as $userObj)
        {
            dump($userObj->toArray());
        }
    }

    /**
     * select & where  获取多条数据
     * SELECT * FROM `tp5_user` WHERE `id` > 18
     */
    public function selectAll()
    {
        // all()方法返回数组(包含多个对象)
        $users = User::where('id','GT','18')
            ->select();
        // 遍历数据
        foreach ($users as $userObj)
        {
            dump($userObj->toArray());
        }
    }

    /********** 获取value *******/

    /**
     * value 获取指定字段的值
     * @return string 返回获取到的字段值
     * SELECT `name` FROM `tp5_user` WHERE `id` = 1 LIMIT 1
     */
    public function model_value()
    {
        $res = User::where('id','EQ','1')
                ->value('name');
        dump($res);
        return $res;
    }

    /********** 获取column *******/

    /**
     * column 获取指定字段处的那一列,返回数组
     * @return array
     */
    public function model_column()
    {
        $res = User::where('id','GT','15')
                ->column('name');
        dump($res);
        return $res;
    }
}
