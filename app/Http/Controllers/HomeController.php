<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Auth;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data['user_count'] = User::where('is_admin','admin')->count();
        $data['total_product']=Product::count();
        $data['total_categories']=ProductCategory::count();
        $data['total_order']=Order::count();

        $data['cancel']=Order::where('status','=',0)->count();
        $data['Confirmed']=Order::where('status','=',1)->count();
        $data['pending']=Order::where('status','=',2)->count();
        $data['processing']=Order::where('status','=',3)->count();
        $data['outofdelivery']=Order::where('status','=',4)->count();
        $data['delivered']=Order::where('status','=',5)->count();
        $data['returned']=Order::where('status','=',6)->count();
        $data['failed']=Order::where('status','=',7)->count();

        return view('admin.dashboard',$data);
    }
}
