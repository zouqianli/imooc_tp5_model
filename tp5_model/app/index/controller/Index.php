<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Config;
class Index extends Controller
{
    public function index()
    {
//        $this->showConfig();
//        $this->dbConnect1();
//        $this->dbConnect2();
//        $this->dbConnect3();
        $this->dbConnect4();
    }

    /**查看配置*/
    public function showConfig()
    {
        dump(config());//配置
        echo "<hr>";
        dump(config('database'));//数据库配置
        echo "<hr>";
        dump(Config::get('database'));//Config类get方法
        echo "<hr>";
    }

    /**1数据库连接(惰性)--数据库配置*/
    public function dbConnect1()
    {
        $res = Db::connect(config('database'));
        dump($res);
    }
    /**2数据库连接(惰性)--数组*/
    public function dbConnect2()
    {
        $res = Db::connect([
            // 数据库类型d
            'type'            => 'mysql',
            'hostname'        => '127.0.0.1',
            'database'        => 'tp5_model',
            'username'        => 'root',
            'password'        => 'root',
            'hostport'        => '3306',
            'charset'         => 'utf8',
            'prefix'          => 'tp5_',
        ]);
        dump($res);
    }
    /** 3使用dsn字符串连接注意个参数间的分隔符如  :  // / # */
    public function dbConnect3()
    {
        $dsnstr = "mysql://root_dsn_str:root@127.0.0:3306/tp5_model#utf8";
        $res = Db::connect($dsnstr);
        dump($res);
    }
    /** 4dsn 还可以在配置文件进行配置*/
    public function dbConnect4()
    {
        $res = Db::connect('dsn_db_config01');//4.1dsn方式
//        $res = Db::connect('dsn_db_config02');//4.2数组方式
//        $res = Db::connect(Config::get('dsn_db_config02'));//4.2数组方式 Config类get方法
        dump($res);
    }
}
