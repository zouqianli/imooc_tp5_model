<?php
namespace app\index\controller;
use think\Db;
class Index
{
    // 方便调用
    protected $table;//声明属性
    public function __construct()
    {
        $this->table = Db::name('user');//初始化属性
    }

    public function index()
    {
        $this->db_insert();
        $this->db_insertGetId();
        $this->db_insertAll();

    }

    /**插入数据*/
    public function db_insert()
    {
        # insert 返回结果为影响记录条数, 插入数
        $res = $this->table->insert([
            'name'   =>  '邹前立',
            'password'   =>  md5('zouqianli'),
            'email'  =>  '1004248149@qq.com',
        ]);
        dump($res);
    }

    /**
     * 插入数据 获取自增id
     */
    public function db_insertGetId()
    {
        # insert 返回结果自增id
        $res = $this->table->insertGetId([
            'name'   =>  '邹前立',
            'password'   =>  md5('zouqianli'),
            'email'  =>  '1004248149@qq.com',
        ]);
        dump($res);
    }

    /**
     * 插入多条数据 返回插入数据成功的行数
     * 可以根据返回值和数据数比较
     * 相等:插入数据成功
     * 不相等:有错误 插入数据不成功
     */
    public function db_insertAll()
    {
        # insert 返回结果为影响记录条数, 插入数
        $data = [];
        for($i=0;$i<10;$i++)
        {
            // $data数组中每一项也是一个数组
            $data[] = [
                'name'   =>  '邹前立'."{$i}",
                'password'   =>  md5('zouqianli'."{$i}"),
                'email'  =>  '1004248149@qq.com',
            ];
        }
        $res = $this->table->insertAll($data);
        dump($res);
    }
}
