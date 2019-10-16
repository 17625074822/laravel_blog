<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'user';
    /*
    *   制定主键
    */
    public $primaryKey = 'id';

    /*
    *   制定是否 模型被戳记时间
    */
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class,'author_id');
    }
}
