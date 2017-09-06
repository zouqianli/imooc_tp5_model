<?php
/**
 * Created by PhpStorm.
 * User: zouqianli
 * Date: 2017/8/29
 * Time: 16:43
 */
namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;
class User extends Model
{
    protected $autoWriteTimestamp = true;
    protected $createTime = false;
    protected $updateTime = 'update_at';

    use SoftDelete; // 使用traits
    protected $deleteTime = 'delete_time';//指定软删除字段
}