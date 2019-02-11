<?php

namespace Smartbro\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Textblock extends Model
{

    protected $fillable = [
        'display',
        'content',
    ];

    public $dates = [
        'created_at','updated_at'
    ];


}
