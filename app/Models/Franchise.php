<?php

namespace Smartbro\Models;

use Illuminate\Database\Eloquent\Model;

class Franchise extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'money',
        'message',
    ];

    public $dates = [
        'created_at','updated_at'
    ];

    public static function Persistent($leadData){
        $lead = self::create($leadData);

        return $lead;
    }
}
