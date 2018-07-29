<?php

namespace Smartbro\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Catalog\Product;
use Illuminate\Database\Eloquent\SoftDeletes;

class Maintain extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'start',
        'end',
        'date',
    ];

    public $dates = [
        'created_at','updated_at'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }


    public static function CreateMaintain($data){
        $maintain = self::create($data);

        return $maintain;
    }
}
