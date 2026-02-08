<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;
use Session;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Auth;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{



    public function store(Request $request)
    {

        $input = $request->all();

        // $product = Product::find($request->food_id);

        $product = DB::connection('oracle')
            ->table('RECIPE_INFO')
            ->join('ITEMS', 'ITEMS.ID', '=', 'RECIPE_INFO.ITEM_ID')
            ->select('RECIPE_INFO.ID as id', 'ITEMS.ITEM_NAME as name', 'RECIPE_INFO.RECIPE_DESC as description', 'RECIPE_INFO.PRICE as price','RECIPE_INFO.AFTER_DIS_PRICE as discount_price', 'RECIPE_INFO.DIS_FLAG as discount_flag', 'RECIPE_INFO.CAT_ID as category_id', 'RECIPE_INFO.STATUS as status', DB::raw("CONCAT('http://123.200.18.157:8889/', ITEMS.ITEM_IMAGE_PATH) as image"))
            ->where(['RECIPE_INFO.ID' => $request->food_id, 'RECIPE_INFO.STATUS' => 'Y'])
            ->first();

        $data['qty']    = 1;
        $data['id']     = $request->food_id;
        $data['name']   = $product->name;

        if($product->discount_flag==1){
            $data['price'] = $product->discount_price;
        }else{
            $data['price'] = $product->price;
        }

        $data['weight'] = '1';

        $data['options']['image'] = $product->image;

        Cart::add($data);


        return response()->JSON();

    }



    public function storesingle(Request $request)
    {
        $input = $request->all();

        $product = Product::find($request->product_id);

        $data['qty']    = $request->qty;
        $data['id']     = $request->product_id;
        $data['name']   = $product->product_title;

        if($product->price_active==1){
            $data['price'] = $product->sell_price;
        }else{
            $data['price'] = $product->discount;
        }

        $data['weight'] = '1';

        $data['options']['image'] = $product->default_image;
        $data['options']['product_slug'] = $product->product_slug;

        Cart::add($data);


        return response()->JSON();
    }



    public function update(Request $request)
    {

       $row = Cart::get($request->rowId);
       $row_item= Cart::update($request->rowId,$row->qty+1);
       return response()->JSON($row_item);
    }



   public function decrementCart(Request $request)
   {
       $rowId = $request->rowId;
       $row = Cart::get($rowId);
       $row_item= Cart::update($rowId,$row->qty-1);
        return response()->JSON($row_item);
   }

   public function remove_cart(Request $request)
   {
        $rowId = $request->rowId;
        $row = Cart::remove($rowId);
        return response()->JSON($row);
   }

    public function cartableajax()
    {
       
        return view('fontend.productscart.carttable');
    }




    public function carttotaljax()
    {
         return view('fontend.productscart.cartsummery');
    }




    public function productscart($locale)
    {
        $data['products'] = Cart::content();
        return view('frontend.pages.cart',$data);
    }






    public function productsbilling()
    {
        if(!Auth::user()){
            $notification = array(
                    'message' => 'Please Login first!',
                    'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }

            $data['countb']  = Billing::where('user_id',Auth::user()->id)->count();
            $data['billing'] = Billing::where('user_id',Auth::user()->id)->first();
            $data['countries']  = Country::all();

            return view('frontend.pages.billing',$data);



    }





    /*cart ajax call */

    public function showcartcount()
    {
        return view('homepage.cartcomponents.count');
    }

    public function showcarthover()
    {
        return view('homepage.cartcomponents.cartview');
    }



    public function showcarttable()
    {
        $data['companies'] = DB::connection('oracle')
            ->table('COMPANY_INFO')
            ->select('COMPANY_ID', 'COMPANY_CODE', 'COM_NAME')
            ->whereIn('COMPANY_ID', [1, 3, 9])
            ->orderBy('COM_NAME')
            ->get();
        $data['company_code'] = Session::get('company_code');
        return view('homepage.cartcomponents.carttable', compact('data'));
    }
    

    public function getTableList(Request $request)
    {
        // 1️⃣ Validate request
        $validator = Validator::make($request->all(), [
            'company_code' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 422,
                'message' => 'Validation failed',
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            // 2️⃣ Fetch data from Oracle
            $data['table'] = DB::connection('oracle')
                ->table('TABLE_MS_INFO')
                ->select(
                    'ID',
                    'TABLE_CODE',
                    'TABLE_NAME',
                    'COMPANY_CODE'
                )
                ->where('STATUS', 'Y')
                ->where('COMPANY_CODE', $request->company_code)
                ->orderBy('TABLE_NAME', 'ASC')
                ->get();

            // 3️⃣ Handle empty result
            if ($data['table']->isEmpty()) {
                return response()->json([
                    'status'  => 404,
                    'message' => 'No tables found for this company',
                    'data'    => []
                ], 404);
            }

            $data['selected_table_code'] = Session::get('table_code');

            // 4️⃣ Success response
            return response()->json([
                'status'  => 200,
                'message' => 'Table list retrieved successfully',
                'data'    => $data
            ], 200);

        } catch (\Exception $e) {
            // 5️⃣ Error handling
            return response()->json([
                'status'  => 500,
                'message' => 'Something went wrong while fetching table list',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function showcartsummery()
    {
        return view('homepage.cartcomponents.summery');
    }



    public function destroy(Request $request)
    {

       Cart::remove($request->rowId);

       return response()->JSON();
    }





}







