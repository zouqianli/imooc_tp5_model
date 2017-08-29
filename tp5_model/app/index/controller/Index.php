<?php
namespace app\index\controller;
use think\Db;
class Index
{
    protected $table;
    public function __construct()
    {
        $this->table = Db::name('user');
    }

    public function index()
    {
        $res = $this->db_insertAll();
        if($res)
        {
            echo "成功插入了{$res}条记录";
        }

    }

    /**
     * 数据准备--插入多条记录
     * @param array $data 待插入数据
     * @return int|string 插入成功的条数
     */
    public function db_insertAll($data = [])
    {
        //  $data = [];
        for($i=1;$i<21;$i++)
        {
            $data[] = [
                'name'  =>  '邹前立'."{$i}",
                'password'  =>  md5("zouqianli")."{$i}",
                'email' =>  '1004248149'."_{$i}@qq.com",
                'num'   =>  "{$i}",
            ];
        }
        // insertAll 返回插入成功的记录数
        $res = $this->table->insertAll($data);
        // 如果 插入成功的记录数 == 数据的条数 插入成功
        if($res == count($data))
        {
            return $res;
        }
    }
}
