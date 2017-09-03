<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    //指定表名
    protected $table = 'message';

    //指定主键
    protected $primaryKey = 'id';

    protected $fillable = ['from','to','words','time'];

    public $timestamps = false;

}