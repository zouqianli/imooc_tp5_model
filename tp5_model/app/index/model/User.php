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

    public function getSexAttr($val)
    {
        //dump($val);
        switch ($val){
            case 0:
                return '男';
            case 1:
                return '女';
            case 2:
                return '保密';
        }
    }
}