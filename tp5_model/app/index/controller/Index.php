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

//        $this->op();
//        $this->op1();
//        $this->op2();
//        $this->op3();
//        $this->op4();
//        $this->op5();
//        $res = $this->db_insertAll();
//        if($res)
//        {
//            echo "成功插入了{$res}条记录";
//        }
    }

    /**
     * 链式操作返回的是一个Db类的对象,可以继续进行链式操作
     * 更多操作查看官方手册
     */
    public function op()
    {
        $res = $this->table
            ->where('id','>','15');
        dump($res);//object(think\db\Query)#6......
    }

    /**
     * 链式操作 常规操作
     */
    public function op1()
    {
        $res = $this->table
            ->where('id', ">", '10') // id>10
            ->field('name, email') // 指定字段 多个 逗号隔开
            ->limit('3') // 从排好序的结果取前三条,
            ->order('id desc') // 根据id降序排序
            ->select();
        dump($res);// SELECT `name`,`email` FROM `tp5_user` WHERE `id` > 10 ORDER BY id desc LIMIT 3
    }

    /**
     * 链式操作 limit
     * limit传入两个参数--常用于分页
     * 计算规则 (currentpage-1)*pagesize
     * 如:limit((p-1)*5, 5);
     */
    public function op2()
    {
        $res = $this->table
            ->where('id', ">", '10') // id>10
            ->field('name, email') // 指定字段 多个 逗号隔开
            ->limit('3', '5') // 偏移量3 取出5条记录,
            ->order('id desc') // 根据id降序排序
            ->select();
        dump($res);// SELECT `name`,`email` FROM `tp5_user` WHERE `id` > 10 ORDER BY id desc LIMIT 3,5
    }

    /**
     * 链式操作 page('1')
     * page()--tp分页
     * 默认查询20条
     */
    public function op3()
    {
        $res = $this->table
            ->where('id', ">", '10') // id>10
            ->field('name') // 指定字段 多个 逗号隔开
            ->page('1')
            ->order('id desc') // 根据id降序排序
            ->select();
        dump($res);// SELECT `name` FROM `tp5_user` WHERE `id` > 10 ORDER BY id desc LIMIT 0,20
    }

    /**
     * 链式操作 page('1', '5')
     * page()--tp分页
     * 两个参数
     * 参数1:第几页
     * 参数2:每页大小
     */
    public function op4()
    {
        $res = $this->table
            ->where('id', ">", '10') // id>10
            ->field('name') // 指定字段 多个 逗号隔开
            ->page('1', '5')
            ->order('id desc') // 根据id降序排序
            ->select();
        dump($res);// SELECT `name` FROM `tp5_user` WHERE `id` > 10 ORDER BY id desc LIMIT 0,5
    }

    /**
     * 链式操作 group
     * 根据字段mygroup的不同值,找到第一条记录,组成数组返回
     *
     * 只使用group,排序按mygroup字段升序
     * 使用order,按指定字段asc|desc
     * 不建议使用关键字作为字段名称:如果使用了,相关操作要用反引号
     *   如:group("`group`")
     */
    public function op5()
    {
        $res = $this->table
            ->where('id', ">", '10') // id>10
            ->field('name, mygroup') // 指定字段 多个 逗号隔开
            ->order('id desc') // 根据id降序排序
            ->group('mygroup')
            ->select();
        dump($res);// SELECT `name` FROM `tp5_user` WHERE `id` > 10 ORDER BY id desc LIMIT 0,5
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
            $mygroup = $i%4;
            $data[] = [
                'name'  =>  '邹前立'."{$i}",
                'password'  =>  md5("zouqianli")."{$i}",
                'email' =>  '1004248149'."_{$i}@qq.com",
                'num'   =>  "{$i}",
                'mygroup'   =>  $mygroup,
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
