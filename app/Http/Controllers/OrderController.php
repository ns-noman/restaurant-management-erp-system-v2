<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use Cart;
use Auth;
use App\Models\OrderDetail;
use App\Models\Product;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        DB::connection('oracle')->beginTransaction();

        try {

            $now = now();

            // 🔹 Get next ORDER ID from Oracle sequence
            $orderId = DB::connection('oracle')
                ->selectOne("SELECT ORDERS_SEQ.NEXTVAL AS ID FROM DUAL")->id;

            $order = [
                "ID"              => $orderId, // ✅ REQUIRED for Oracle
                "ORDER_DATE"      => $now->format('Y-m-d H:i:s'),
                "STATUS"          => 'P',
                "BRANCH_CODE"     => '00002',
                "COMPANY_CODE"    => 'CL-BIHQ-14062025-3',
                "CREATED_ON"      => $now->format('Y-m-d H:i:s'),
                "CREATED_TIME"    => $now->format('h:i:s A'),
                "TABLE_ID"        => 154,
                "SUBTOTAL"        => (float) str_replace(',', '', Cart::subtotal()),
                "VAT"             => (float) str_replace(',', '', Cart::tax()),
                "DISCOUNT"        => 0,
                "DELIVERY_CHARGE" => 40,
                "GRAND_TOTAL"     => (float) str_replace(',', '', Cart::total()) + 40,
                "PAYMENT_MODE"    => 'C',
                "SERVICE_TYPE"    => 'TW',
                "ACCESS_MODE"     => 'N',
                "WORK_PERIOD_ID"  => null,
                "VOID_STATUS"     => 'N',
                "PAYMENT_STATUS"  => 'D',
                "VAT_ID"          => 4,
                "SERVICE_ID"      => 3,
                "APP_FLAG"        => 'N',
                "BM_ID"           => 8,
                "COMPANY_ID"      => 3,
                "CREATED_BY_ID"   => 137,
                "MODIFIED_BY_ID"  => 137,
                "SD_AMT"          => 0,
            ];

            DB::connection('oracle')->table('ORDERS')->insert($order);

            foreach (Cart::content() as $data) {

                $product = DB::connection('oracle')
                    ->table('RECIPE_INFO')
                    ->select(
                        'RECIPE_INFO.ID as recipe_id',
                        'RECIPE_INFO.ITEM_ID as item_id',
                        'RECIPE_INFO.SIZE_ID as size_id'
                    )
                    ->where('RECIPE_INFO.ID', $data->id)
                    ->first();

                if (!$product) {
                    continue; // safety check
                }

                $orderDetails = [
                    "ORDER_ID"        => $orderId, // ✅ now defined
                    "ITEM_ID"         => $product->item_id,
                    "QTY"             => $data->qty,
                    "PRICE"           => (float) $data->price,
                    "BRANCH_CODE"     => '00002',
                    "COMPANY_CODE"    => 'CL-BIHQ-14062025-3',
                    "SIZE_ID"         => $product->size_id,
                    "GIFT_ITEM"       => 'N',
                    "VOID_ITEM"       => 'N',
                    "STATUS"          => '0',
                    "CUSTOMER_STATUS" => 'TW',
                    "CREATED_ON"      => $now->format('Y-m-d H:i:s'),
                    "CREATED_TIME"    => $now->format('h:i:s A'),
                    "KITCHEN_ITEM"    => 'N',
                    "RETURN_ITEM"     => 'N',
                    "RETURN_REASON"   => '',
                    "COMPANY_ID"      => 3,
                    "BM_ID"           => 8,
                    "REMARKS"         => 'Nowab Shorif Test',
                ];

                DB::connection('oracle')
                    ->table('ORDER_DETAILS')
                    ->insert($orderDetails);
            }

            // cart::destroy();

            DB::connection('oracle')->commit();

            $notification = [
                'message' => 'Your Order Successfully Completed!',
                'alert-type' => 'success'
            ];

            return redirect()->route('user.dashboard')->with($notification);

        } catch (\Throwable $e) {
            DB::connection('oracle')->rollback();
            throw $e;
        }
    }


        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Order  $order
         * @return \Illuminate\Http\Response
         */
        public function show(Order $order)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Order  $order
         * @return \Illuminate\Http\Response
         */
        public function edit(Order $order)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Order  $order
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Order $order)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Order  $order
         * @return \Illuminate\Http\Response
         */
        public function destroy(Order $order)
        {
            //
        }
    }
