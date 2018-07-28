<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/25
 * Time: 11:22
 */

namespace Smartbro\Controllers\backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Smartbro\Models\Reservation;
use App\Models\Catalog\Product;
use App\Models\Lead;
use Carbon\Carbon;
use App\Models\Catalog\Category;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->dataForView['menuName'] = 'dashboard';
        $this->dataForView['config'] = Configuration::find(1);
        $this->dataForView['products'] = Product::orderBy('id','desc')->paginate(config('system.PAGE_SIZE'));
        $reservations = Reservation::orderBy('at','asc')->orderBy('created_at','asc');
        $this->dataForView['reservations'] = $reservations->paginate(config('system.PAGE_SIZE'));
        $this->dataForView['pastreservations'] = Reservation::GetPastReservations();
        $this->dataForView['comingreservations'] = Reservation::GetComingReservations();
        $this->dataForView['users'] = User::where('group_id','1')->orderBy('id','desc')->get();
        $this->dataForView['leads'] = Lead::orderBy('id','desc')
            ->paginate(config('system.PAGE_SIZE'));
        return view(_get_frontend_theme_path('admin.index'), $this->dataForView);
    }

    public function tables(){
        $this->dataForView['menuName'] = 'tables';
        $this->dataForView['pageTitle'] = 'All Reservations';
        $this->dataForView['config'] = Configuration::find(1);
        $this->dataForView['reservations']=  Reservation::orderBy('at','asc')->orderBy('created_at','asc')->get();
        return view(_get_frontend_theme_path('admin.tables'), $this->dataForView);
    }

    public function tablescoming(){
        $this->dataForView['menuName'] = 'tables';
        $this->dataForView['pageTitle'] = 'Coming Reservations';
        $this->dataForView['config'] = Configuration::find(1);
        $this->dataForView['reservations']=  Reservation::GetComingReservations();
        return view(_get_frontend_theme_path('admin.tables'), $this->dataForView);
    }
    public function tablespast(){
        $this->dataForView['menuName'] = 'tables';
        $this->dataForView['pageTitle'] = 'Finished Reservations';
        $this->dataForView['config'] = Configuration::find(1);
        $this->dataForView['reservations']=  Reservation::GetPastReservations();
        return view(_get_frontend_theme_path('admin.tables'), $this->dataForView);
    }

    public function delete($id){
        Reservation::where('id',$id)->delete();
        return redirect('admin/reservations/all');
    }

    public function edit($id){
        $this->dataForView['pageTitle'] = 'Reservation Update';
        $this->dataForView['reservation']=Reservation::find($id);
        return view(_get_frontend_theme_path('admin.update'),$this->dataForView);
    }

    public function update($id,Request $request){
        $reservation = $request->get('reservation');
        $reservation['name'] = $reservation['firstname'].' '.$reservation['lastname'];
        $str = $reservation['at_date'].' '.$reservation['at_time'];
        $reservation['at']= Carbon::createFromFormat('Y-m-d H:i',$str,'Australia/Melbourne');
        Reservation::find($id)->update($reservation);
        return redirect('/admin/home');
    }

    public function customer(){
        $this->dataForView['menuName'] = 'tables';
        $this->dataForView['config'] = Configuration::find(1);
        $this->dataForView['users'] = User::where('group_id','1')->orderBy('id','desc')->get();
        return view(_get_frontend_theme_path('admin.customers'), $this->dataForView);
    }

    public function createview(){
        $this->dataForView['pageTitle'] = 'Reservation Create';
        $this->dataForView['config'] = Configuration::find(1);
        $this->dataForView['promotionProducts'] = Category::LoadPromotionProducts();
        return view(_get_frontend_theme_path('admin.create'), $this->dataForView);
    }

    public function create(Request $request){
        $reservation = $request->get('reservation');
        if($reservation = Reservation::Persistent($reservation)){
            return back()->with('success','Your reservation has been sent!');
        }
        return back()->with('error','Something wrong with the server!');
    }
}