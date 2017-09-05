<?php
/**
 * Created by PhpStorm.
 * User: zouqianli
 * Date: 2017/8/29
 * Time: 16:43
 */
namespace app\index\model;
use think\Model;
class User extends Model
{
    // 自动插入|更新
    protected $auto = [
        'time',//字段
    ];
    // 只会自动插入
    protected $insert = [
        'time_insert',//字段
    ];
    // 只会自动更新
    protected $update = [
        'time_update',//字段
    ];

    /**
     * 自动插入|更新
     * @return int 时间戳
     */
    public function setTimeAttr()
    {
        return time();// 时间戳
    }

    /**
     * 只会自动插入
     * @return int 时间戳
     */
    public function setTimeInsertAttr()
    {
        return time();// 时间戳
    }

    /**
     * 只会自动更新
     * @return int 时间戳
     */
    public function setTimeUpdateAttr()
    {
        echo 'k';
        return time();// 时间戳
    }

    /**
     * 修改器--密码为例
     * @param $val 某个变量(表中对应字段)
     * @param $data 所有变量(所有字段)--获取器也有这个参数
     * @return string 返回处理过后的值--设置字段值
     */
    public function setPasswordAttr($val,$data)
    {
        //dump(md5($val.$data['name']));
        return md5($val);
    }
}