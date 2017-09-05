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