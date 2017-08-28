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
        $this->db_delete();
        $this->db_delete2();
        $this->db_delete3();
        $this->db_delete4();
        $this->db_delete5();
    }

    /**1 没有条件不会执行删除操作*/
    public function db_delete()
    {
        $res = $this->table
            ->delete();
        dump($res);
    }

    /**2 根据where条件删除*/
    public function db_delete2()
    {
        $res = $this->table
            ->where([
                'id' => 1,
            ])
            ->delete();
        dump($res);
    }

    /**3 根据某个主键 删除 某个记录*/
    public function db_delete3()
    {
        $res = $this->table
            ->delete(3);
        dump($res);
    }
    /**4 根据多个主键 删除 多个记录*/
    public function db_delete4()
    {
        $res = $this->table
            ->delete([
                3,4,5
            ]);
        dump($res);
    }

    /**5 根据where条件删除 所有数据 */
    public function db_delete5()
    {
        $res = $this->table
            ->where("1=1") // 全部删除
            ->delete();
        dump($res);
    }
}
