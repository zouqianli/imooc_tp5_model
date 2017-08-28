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
//        $this->db_where();
//        $this->db_where2();
//        $this->db_where3();
//        $this->db_where4();
//        $this->db_where5();
        $this->db_where6();
    }

    /**
     * 1 where条件传入 字符串
     * string(45) "( SELECT * FROM `tp5_user` WHERE  (  id=1 ) )"
     */
    public function db_where()
    {
        $res = $this->table->where("id=1")
            ->buildSql();
        dump($res);
    }

    /**
     * 2 where条件传入  数组
     * string(44) "( SELECT * FROM `tp5_user` WHERE  `id` = 1 )"
     */
    public function db_where2()
    {
        $res = $this->table->where([
            "id" => 1,
        ])
            ->buildSql();
        dump($res);
    }

    /**
     * 2 where条件传入  三个参数(推荐): 字段 条件操作符 条件
     * string(45) "( SELECT * FROM `tp5_user` WHERE  `id` = 1 )"
     */
    public function db_where3()
    {
        $res = $this->table->where("id","EQ","1")
            ->buildSql();
        dump($res);
    }

    /**
     *  4 更多选项
     *  默认多个字段是AND关系
        条件表达式:
        EQ =
        NEQ <>
        LT <
        ELT <=
        GT >
        EGT >=
        IN IN(*,*)
        NOT IN NOT IN(*,*)
        BETWEEN BETWEEN * AND *
        NOT BETWEEN NOT BETWEEN * AND *
     */
    public function db_where4()
    {
        //string(45) "( SELECT * FROM `tp5_user` WHERE  `id` >= 1 )"
        //string(72) "( SELECT * FROM `tp5_user` WHERE  `id` IN (1,2,3,4)  AND `name` = 'zz' )"
        $res = $this->table
            ->where([
//                'id'    =>  ["EGT",'1']//EGT
                'id'    =>  ["IN",[1,2,3,4]],//IN
                'name' =>   'zz',

            ])
            ->buildSql();
        dump($res);
    }

    /**
     * 5 EXP表达式
     * string(59) "( SELECT * FROM `tp5_user` WHERE  ( `id` not in (1,2,3) ) )"
     */
    public function db_where5()
    {
        $res = $this->table
            ->where('id',"EXP","not in (1,2,3)")
            ->buildsql();
        dump($res);
    }

    /**
     * 6 where(AND) whereOr(OR)
     * string(89) "( SELECT * FROM `tp5_user` WHERE  `id` < 5  AND `email` = '100@qq.com' OR `name` = 'zz' )"
     */
    public function db_where6()
    {
        $res = $this->table
            ->where('id',"LT","5")
            ->where('email',"EQ","100@qq.com")
            ->whereOr("name","EQ","zz")
            ->buildsql();
        dump($res);
    }
}
