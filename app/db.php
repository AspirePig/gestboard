<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class db extends Model
{
    protected $table = 'db';

    protected $primaryKey = 'id';

    //指定批量执行的字段
    protected $fillable = ['name', 'passwd'];

    public $timestamps = false;
}