<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    public function index()
    {
//        $this->dbExcuteWithSqlStatement();
        $this->dbQueryWithSqlStatement();
        $this->Db_select();
        $this->Db_find();
        $this->Db_value();
        $this->Db_column();
        $this->Db_column2();
        $this->Db_select2();
        $this->Db_find2();
    }

    /**使用Db类的query方法的sql语句查询数据*/
    public function dbQueryWithSqlStatement()
    {
        // query返回数组
        $res = Db::query("select * from tp5_user where id=?",["4"]);
        dump($res);
    }

    /**使用Db类的execute方法的sql语句插入数据*/
    public function dbExcuteWithSqlStatement()
    {
        // execute返回1
        $res = Db::execute("insert into tp5_user set name=?,password=? email=?",[
            'imooc',
            md5('imooc'),
            'imooc@qq.com'
        ]);
        dump($res);
    }

    /**使用Db类的select方法查询多条记录(0,1,2...)数据*/
    public function Db_select()
    {
        // select返回二维数组,没有返回空数组
        $res = Db::table('tp5_user')
            // ->where(['id'=>99])
            ->select();
        dump($res);
    }

    /**
     *  使用Db类的find方法查询一条数据
     *  默认返回记录中正序的第一条记录
     */
    public function Db_find()
    {
        // select返回一维数组,没有返回空NULL
        $res = Db::table('tp5_user')
//             ->where(['id'=>99])
            ->find();
        dump($res);
    }

    /**使用Db类的value方法查询某个字段数据*/
    public function Db_value()
    {
        $res = Db::table('tp5_user')
            ->where(['id'=>99])//没有返回空null
            ->value('name');// 返回字段的值
        dump($res);
    }

    /**
     *  使用Db类的column方法查询某个属性列数据
     *  只有一个参数:理解为key--指定列
     *  返回一维数组
     */
    public function Db_column()
    {
        $res = Db::table('tp5_user')
//            ->where(['id'=>99])//没有返回空数组
            ->column('name');// 返回字段的值
        dump($res);
    }
    /**
     *  使用Db类的column方法查询某个属性列数据
     *  第一个参数作为返回数组的value
     *  第二个参数作为返回数组的key
     *  返回一维数组
     */
    public function Db_column2()
    {
        $res = Db::table('tp5_user')
//            ->where(['id'=>99])//没有返回空数组
            ->column('email','name');// 返回字段的值
        dump($res);
    }

    /****** 注意 ******/
    /**
     *  推荐使用Db类的name方法替代table方法
     *  可以省略表前缀
     *  在database配置文件中有表前缀配置
     */
    public function Db_select2()
    {
        $res = Db::name('user')
            ->select();
        dump($res);
    }

    /**
     *  Db类是一个单利模式
     *  db()助手函数每次调用都会初始化
     *  如果阻止db助手函数的初始化,需要第三个参数false
     */
    public function Db_find2()
    {
//        $res = db('user')
        $res = db('user',[],false)
            ->find();
        dump($res);
    }

}

