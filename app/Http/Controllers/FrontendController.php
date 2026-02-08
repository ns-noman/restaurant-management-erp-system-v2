<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Feedback;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\OrderDetail;
use App\Models\Order;
use Auth;

class FrontendController extends Controller
{



    public function userdashboard()
    {
        $data['orders'] = Order::where('user_id',Auth::user()->id)->latest()->get();
        return view('userdashboard',$data);
    }







    public function index()
    {
        $data['products']   = Product::WhereNull('deleted_at')->latest()->get();
        $data['categories'] = ProductCategory::WhereNull('deleted_at')->limit(9)->get();
        return view('homepage.pages.index',$data);
    }

    public function menu($company='woodenspoon')
    {
        $company_ids = ['woodenspoon'=>1,'deshibites'=>9];
        $company = strtolower($company);
        if($company == 'woodenspoon'){

        }elseif($company == 'deshibites'){

        }else{
            $company='woodenspoon';
        }
        $company_id = $company_ids[$company];

        // $data['categories'] = ProductCategory::WhereNull('deleted_at')->get(); Old
        $data['categories'] = DB::connection('oracle')
            ->table('CATEGORIES')
            ->select('ID as id', 'CATEGORY_NAME as name')
            ->where(['COMPANY_ID' => $company_id, 'STATUS' => 'Y'])
            ->get();
        foreach ($data['categories'] as $key => $category) {
            $data['categories'][$key]->food = DB::connection('oracle')
                ->table('RECIPE_INFO')
                ->join('ITEMS', 'ITEMS.ID', '=', 'RECIPE_INFO.ITEM_ID')
                ->select('RECIPE_INFO.ID as id', 'ITEMS.ITEM_NAME as name', 'RECIPE_INFO.RECIPE_DESC as description', 'RECIPE_INFO.PRICE as price', 'RECIPE_INFO.CAT_ID as category_id', 'RECIPE_INFO.STATUS as status', DB::raw("CONCAT('http://123.200.18.157:8889/', ITEMS.ITEM_IMAGE_PATH) as image"))
                ->where(['RECIPE_INFO.CAT_ID' => $category->id, 'RECIPE_INFO.STATUS' => 'Y'])
                ->get();
        }
        return view('homepage.pages.menu',$data);
    }



    public function cart(){
        return view('homepage.pages.cartpage');
    }



    public function about(){

        return view('homepage.pages.about');
    }

    public function contact(){

        return view('homepage.pages.contact');
    }


    public function contactstore(Request $request)
    {
        $request->validate([
                'name'   => 'required',
               'email'   => 'required',
               'mobile'   => 'required',
               'subject' => 'required',
               'comments'=> 'required',
            ]);


            $contact = New Contact();

            $contact->name    = $request->name;
            $contact->email   = $request->email;
            $contact->mobile  = $request->mobile;
            $contact->subject = $request->subject;
            $contact->message = $request->comments;
            $contact->status  = 1;

            $contact->save();

            $notification = array(
                'message' => 'Contact form Successfully Submitted!',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
    }





    public function blogs(){

        return view('homepage.pages.blogs');
    }

    public function blogsingle(){

        return view('homepage.pages.blogsingle');
    }



    public function reservationstore(Request $request)
    {

        $request->validate([
            'name'  => 'required',
            'email' => 'nullable',
            'phone' => 'required|numeric',
            'person'=> 'required',
            'reservation_date'=> 'required',
            'reservation_time'=> 'required',
            'message'=> 'required',
        ]);



         $resarvation = new Reservation();

         $resarvation->name          = $request->name;
         $resarvation->email         = $request->email;
         $resarvation->phone         = $request->phone;
         $resarvation->person        = $request->person;
         $resarvation->reservation_date = $request->reservation_date;
         $resarvation->reservation_time = $request->reservation_time;
         $resarvation->message       = $request->message;
         $resarvation->status        = 1;

         $resarvation->save();

         $notification = array(
              'message' => 'Reservation Successfully Submitted!',
              'alert-type' => 'success'
          );

         return redirect()->back()->with($notification);
    }




    public function login()
    {
        return view('homepage.pages.login');
    }


    public function register()
    {
        return view('homepage.pages.register');
    }


    public function feedback()
    {
        $data['feedbacks'] = Feedback::latest()->get();
        return view('homepage.pages.feedback',$data);
    }


    public function feedbackstore(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'mobile'       => 'required',
            'email'       => 'required|email',
            'rating'       => 'required',
            'comments'  => 'required',
        ]);

            $feedback = New Feedback();

            $feedback->name          = $request->name;
            $feedback->email         = $request->email;
            $feedback->mobile        = $request->mobile;
            $feedback->rating        = $request->rating;

            $feedback->q_food        = $request->q_food;
            $feedback->cleanliness   = $request->cleanliness;
            $feedback->q_service     = $request->q_service;
            $feedback->friendliness  = $request->friendliness;
            $feedback->speed         = $request->speed;
            $feedback->apprearance   = $request->apprearance;

            $feedback->comments      = $request->comments;

            $image = $request->file('image');
            if ($image) {
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'public/images/feedbacks/';
                $imagename = $filepath . $uniqname . '.' . $ext;
                $image->move($filepath, $imagename);
                $feedback->image = $imagename;
            }
            $feedback->save();

            $notification = array(
                'message' => 'Feedback Successfully Submitted!',
                'alert-type' => 'success'
            );

         return redirect()->back()->with($notification);
    }

}
