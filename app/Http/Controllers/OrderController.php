<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Auth;
use DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        DB::connection('oracle')->beginTransaction();

        try {

            $now = now();

            $company_code = $request->company_code;
            $table_code = $request->table_code;
            $delivery_charge = 0;
            $discount = 0;
            $subtotal = (float) str_replace(',', '', Cart::subtotal());
            $vat = $taleInfo = DB::connection('oracle')
                        ->table('COM_VATS')
                        ->where('COMPANY_CODE', $company_code)
                        ->first();
            $service = $taleInfo = DB::connection('oracle')
                        ->table('COM_SERVICE_CHARGES')
                        ->where('COMPANY_CODE', $company_code)
                        ->first();
            $service_charge = (float) $subtotal * ($service->service_perc / 100);
            $vat_amount = (float) $subtotal * ($vat->vat_perc / 100);
            $grand_total = $subtotal + $vat_amount + $service_charge - $discount;

            $companyInfo = DB::connection('oracle')
                        ->table('COMPANY_INFO')
                        ->select('COMPANY_ID', 'COMPANY_CODE', 'BM_ID', 'COMPANY_SHORT')
                        ->where('COMPANY_CODE', $company_code)
                        ->first();

            $taleInfo = DB::connection('oracle')
                        ->table('TABLE_MS_INFO')
                        ->select('*')
                        ->where('COMPANY_CODE', $company_code)
                        ->where('TABLE_CODE', $table_code)
                        ->first();

            $invoice_id = DB::connection('oracle')
                        ->table('ORDERS')
                        ->where('COMPANY_CODE', $companyInfo->company_code)
                        ->max('INVOICE_ID') + 1;

            $invoice_no = $companyInfo->company_short . '.INV.' . str_pad($invoice_id, 8, '0', STR_PAD_LEFT) . '.' . date('y');

            if (!$taleInfo || !$companyInfo) {
                throw new \Exception('Invalid company or table information.');
            }

            $orderId = DB::connection('oracle')
                ->selectOne("SELECT  SETUP_PKG.GET_MAX_ID ('ORDERS', 'ID') AS ID FROM DUAL")->id;

            $order = [
                "ID"              => $orderId,
                "CUSTOMER_ID"     => Auth::id(),
                "ORDER_DATE"      => $now->format('Y-m-d H:i:s'),
                "INVOICE_NO"      => $invoice_no,
                "INVOICE_ID"      => $invoice_id,
                "STATUS"          => 'O',
                "BRANCH_CODE"     => $taleInfo->branch_code,
                "COMPANY_CODE"    => $companyInfo->company_code,
                "CREATED_ON"      => $now->format('Y-m-d H:i:s'),
                "CREATED_TIME"    => $now->format('h:i:s A'),
                "TABLE_ID"        => $taleInfo->id,
                "SUBTOTAL"        => $subtotal,
                "VAT"             => $vat_amount,
                "DISCOUNT"        => $discount,
                "DELIVERY_CHARGE" => $delivery_charge,
                "GRAND_TOTAL"     => $grand_total,
                "PAYMENT_MODE"    => 'C',
                "SERVICE_TYPE"    => 'TW',
                "ACCESS_MODE"     => 'N',
                "WORK_PERIOD_ID"  => null,
                "VOID_STATUS"     => 'N',
                "PAYMENT_STATUS"  => 'D',
                "VAT_ID"          => $vat->id,
                "SERVICE_ID"      => $service->id,
                "APP_FLAG"        => 'N',
                "BM_ID"           => $companyInfo->bm_id,
                "COMPANY_ID"      => $companyInfo->company_id,
                "CREATED_BY_ID"   => '',
                "MODIFIED_BY_ID"  => '',
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
                    continue;
                }
                $orderDetails = [
                    "ORDER_ID"=> $orderId,
                    "ITEM_ID"         => $product->item_id,
                    "QTY"             => $data->qty,
                    "PRICE"           => (float) $data->price,
                    "BRANCH_CODE"     => $taleInfo->branch_code,
                    "COMPANY_CODE"    => $companyInfo->company_code,
                    "STATUS"=> '0',
                    "CREATED_BY"=> Auth::id(),
                    "CREATED_ON"=> $now->format('Y-m-d H:i:s'),
                    "CREATED_TIME"=> $now->format('h:i:s A'),
                    "MODIFIED_BY"=> Auth::id(),
                    "MODIFIED_ON"=> $now->format('Y-m-d H:i:s'),
                    "MODIFIED_TIME"=> $now->format('h:i:s A'),
                    "SIZE_ID"=> $product->size_id,
                    "GIFT_ITEM"=> 'N',
                    "VOID_ITEM"=> 'N',
                    "RETURN_ITEM"=> 'N',
                    "RETURN_REASON"=> '',
                    "PICKUP_ON"=> null,
                    "COMPANY_ID"=> $companyInfo->company_id,
                    "BM_ID"=> $companyInfo->bm_id,
                    "CREATED_BY_ID"=> Auth::id(),
                    "MODIFIED_BY_ID"=> Auth::id(),
                    "REMARKS"=> 'Nowab Shorif Test',
                ];
                DB::connection('oracle')
                    ->table('ORDER_DTL_TEMP')
                    ->insert($orderDetails);
            }

            DB::connection('oracle')
                        ->table('TABLE_MS_INFO')
                        ->where('ID', $taleInfo->id)
                        ->update(['ACTIVITY_LOG' => 'N']);

            cart::destroy();

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

}
