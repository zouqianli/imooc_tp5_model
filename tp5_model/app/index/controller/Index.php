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
//        $this->db_insertAll();//准备数据
        $this->db_update();
        $this->db_setField();
        $this->db_setField2();
        $this->db_setInc();
        $this->db_setInc2('num',3);
        $this->db_setDec();
        $this->db_setDec2('num',3);
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
        for($i=1;$i<31;$i++)
        {
            // $data数组中每一项也是一个数组
            $data[] = [
                'name'   =>  '邹前立'."{$i}",
                'password'   =>  md5('zouqianli'."{$i}"),
                'email'  =>  '1004248149_'."{$i}".'@qq.com',
            ];
        }
        $res = $this->table->insertAll($data);
        dump($res);
    }

    /**
     * update 更新数据
     * 可以更新多个字段
     * 返回影响记录的行数 不影响返回0
     */
    public function db_update()
    {
        $res = $this->table
            ->where([
                'id'    => 1,
            ])
            ->update([
                'name' => 'zouqianli',
                'email' =>  '1004248149@qq.com',
            ]);
        dump($res);
    }

    /**
     * setfield 更新数据
     * 更新一个字段
     * 返回影响记录的行数 不影响返回0
     */
    public function db_setField()
    {
        $res = $this->table
            ->where([
                'id'    => 3,
            ])
            ->setField('name' ,'zouqianli');
        dump($res);
    }

    /**
     * setfield 更新数据
     * 更新多个字段 手册上并没有介绍这种方式
     * 返回影响记录的行数 不影响返回0
     */
    public function db_setField2()
    {
        $res = $this->table
            ->where([
                'id'    => 2,
            ])
            ->setField([
                'name' => 'zouqianli',
                'email' =>  '1004248149@qq.com',
            ]);
        dump($res);
    }


    /**
     * 字段的自增 默认自增1
     * 第一个参数:字段
     */
    public function db_setInc()
    {
        $res = $this->table
            ->where([
                'id' => 5,
            ])
            ->setInc('num');
        dump($res);
    }
    /**
     * 字段的自增
     * 第一个参数:字段
     * 第二个参数:设置自增步长
     */
    public function db_setInc2($field,$step)
    {
        $res = $this->table
            ->where([
                'id' => 5,
            ])
            ->setInc('num',$step);
        dump($res);
    }

    /**
     * 字段的自减 默认自减1
     * 第一个参数:字段
     */
    public function db_setDec()
    {
        $res = $this->table
            ->where([
                'id' => 5,
            ])
            ->setDec('num');
        dump($res);
    }
    /**
     * 字段的自减
     * 第一个参数:字段
     * 第二个参数:设置自减步长
     */
    public function db_setDec2($field,$step)
    {
        $res = $this->table
            ->where([
                'id' => 5,
            ])
            ->setDec('num',$step);
        dump($res);
    }
}
