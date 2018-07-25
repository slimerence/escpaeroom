<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/25
 * Time: 11:22
 */

namespace Smartbro\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Smartbro\Models\Reservation;
use App\Models\Catalog\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->dataForView['config'] = Configuration::find(1);
        $this->dataForView['products'] = Product::orderBy('id','desc')->paginate(config('system.PAGE_SIZE'));
        $reservations = Reservation::orderBy('at','asc');
        $this->dataForView['reservations'] = $reservations->paginate(config('system.PAGE_SIZE'));
        $this->dataForView['pastreservations'] = Reservation::GetPastReservations();
        $this->dataForView['comingreservations'] = Reservation::GetComingReservations();
        return view(_get_frontend_theme_path('admin.index'), $this->dataForView);
    }
}