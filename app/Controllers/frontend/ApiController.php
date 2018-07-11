<?php
/**
 * Created by PhpStorm.
 * User: justinwang
 * Date: 10/7/18
 * Time: 5:38 PM
 */

namespace Smartbro\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Smartbro\Models\Reservation;
use Smartbro\Models\TimeSlot;

class ApiController extends Controller
{
    public function get_available_time_slot(Request $request){
        dump(TimeSlot::GetAll());
    }
}