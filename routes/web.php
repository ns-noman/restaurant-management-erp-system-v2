<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    use Illuminate\Support\Facades\DB;


    Route::get('/tldetails', function () {
        // Fetch all columns for all tables owned by WSR_MS
        $columns = DB::connection('oracle')
            ->table('dba_tab_columns')
            ->select('table_name', 'column_name', 'data_type', 'data_length', 'nullable')
            ->where('owner', 'WSR_MS')
            ->orderBy('table_name')
            ->orderBy('column_id')
            ->get();

        // Prepare HTML output
        $html = '<h2>Oracle Tables and Columns for WSR_MS</h2>';

        $currentTable = '';
        foreach ($columns as $col) {
            // Start new table for each table_name
            if ($currentTable !== $col->table_name) {
                if ($currentTable !== '') {
                    $html .= '</table><br>'; // close previous table
                }
                $currentTable = $col->table_name;
                $html .= '<h3>Table: ' . htmlspecialchars($currentTable) . '</h3>';
                $html .= '<table border="1" cellpadding="5" cellspacing="0">';
                $html .= '<tr><th>#</th><th>Column Name</th><th>Data Type</th><th>Length</th><th>Nullable</th></tr>';
            }

            $html .= '<tr>';
            $html .= '<td>' . ($col->column_id ?? '-') . '</td>'; // column_id may not be fetched, optional
            $html .= '<td>' . htmlspecialchars($col->column_name) . '</td>';
            $html .= '<td>' . htmlspecialchars($col->data_type) . '</td>';
            $html .= '<td>' . htmlspecialchars($col->data_length) . '</td>';
            $html .= '<td>' . htmlspecialchars($col->nullable) . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>'; // close last table
        return $html;
    });


    Route::get('/tlist', function () {
        // Fetch all tables owned by WSR_MS from Oracle
        $tables = DB::connection('oracle')
            ->table('dba_tables')
            ->select('table_name')
            ->where('owner', 'WSR_MS')
            ->get();

        // Start HTML table
        $html = '<h2>Oracle Tables for WSR_MS</h2>';
        $html .= '<table border="1" cellpadding="5" cellspacing="0">';
        $html .= '<tr><th>#</th><th>Table Name</th></tr>';

        // Loop through tables
        foreach ($tables as $index => $table) {
            $html .= '<tr>';
            $html .= '<td>' . ($index + 1) . '</td>';
            $html .= '<td>' . htmlspecialchars($table->table_name) . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        return $html;
    });

    Route::get('/table/{tableName}', function ($tableName) {
        // $tableName = 'COMPANY_INFO';
        $owner = 'WSR_MS'; // Oracle schema owner

        // 1️⃣ Get all columns of the table (Oracle stores them in uppercase)
        $columns = DB::connection('oracle')
            ->table('dba_tab_columns')
            ->select('column_name')
            ->where('owner', $owner)
            ->where('table_name', $tableName)
            ->orderBy('column_id')
            ->pluck('column_name') // get as array
            ->toArray(); // keep original uppercase
        // echo "<pre>";
        // print_r($columns);
        // echo "</pre>";

        // 2️⃣ Fetch last 10 records
        $records = DB::connection('oracle')
            ->table($tableName)
            ->select('*')
            ->where('COMPANY_CODE', 'CL-BIHQ-14062025-3')
            ->orderBy('ID', 'DESC')
            ->limit(10)
            ->get()
            ->map(function ($row) {
                // Convert object to array with UPPERCASE keys
                $rowArray = (array) $row;
                $upperRow = [];
                foreach ($rowArray as $key => $value) {
                    $upperRow[strtoupper($key)] = $value;
                }
                return $upperRow;
            });

        // 3️⃣ Generate HTML table
        $html = '<h2>Last 10 Records from ' . htmlspecialchars($tableName) . '</h2>';
        $html .= '<table border="1" cellpadding="5" cellspacing="0">';

        // Header row
        $html .= '<tr>';
        foreach ($columns as $col) {
            $html .= '<th>' . htmlspecialchars($col) . '</th>';
        }
        $html .= '</tr>';

        // Data rows
        foreach ($records as $row) {
            $html .= '<tr>';
            foreach ($columns as $col) {
                $html .= '<td>' . htmlspecialchars($row[$col] ?? '') . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</table>';
        return $html;
    });


    Route::get('/qr-scan/{company_code}/{table_code}', 'QRScanController@qrScan')->name('qr.scan');




    Route::get('/','FrontendController@index')->name('homepage');

    Route::get('/food/menu/{company?}','FrontendController@menu')->name('menu');
    Route::get('/about','FrontendController@about')->name('about');
    Route::get('/contact','FrontendController@contact')->name('contact');
    Route::post('/contact/store','FrontendController@contactstore')->name('contact.store');
    Route::get('/feedback','FrontendController@feedback')->name('feedback');
    Route::post('/feedbackstore','FrontendController@feedbackstore')->name('feedbackstore');

    Route::get('/blogs','FrontendController@blogs')->name('blogs');
    Route::get('/blog/details/{slug}','FrontendController@blogsingle')->name('blogsingle');

    Route::get('/cart','FrontendController@cart')->name('cart.page');

    Route::post('resarvation/submit','FrontendController@reservationstore')->name('resarvation.submit');


    Route::get('user/login','FrontendController@login')->name('user.login');
    Route::get('user/register','FrontendController@register')->name('user.register');



  /* ================= product shopping cart  ==================================*/
    Route::post('food/add_to_cart', 'ShoppingCartController@store')->name('food.add_to_cart');
    Route::post('food/addtocart', 'ShoppingCartController@storesingle')->name('food.single.cart');
    Route::post('food/cart_update', 'ShoppingCartController@update');
    Route::get('food/cart', 'ShoppingCartController@productscart')->name('food.cart');
    Route::post('food/cart/item/destroy/', 'ShoppingCartController@destroy')->name('product.cart.destroy');


     //for ajax call

    Route::get('/food/shopping/cart/count/ajax','ShoppingCartController@showcartcount')->name('food.cart.count.ajax');
    Route::get('/food/shopping/cart/hover/ajax','ShoppingCartController@showcarthover')->name('food.cart.hover.ajax');

    Route::get('/food/carttable/ajax','ShoppingCartController@showcarttable')->name('food.cartable.ajax');
    Route::get('/food/cartsummery/ajax','ShoppingCartController@showcartsummery')->name('food.cartsummery.ajax');
    Route::post('/food/incrementCart','ShoppingCartController@update')->name('food.incrementCart');
    Route::post('/food/decrementCart','ShoppingCartController@decrementCart')->name('food.decrementCart');
    Route::post('/food/remove_cart','ShoppingCartController@remove_cart')->name('food.remove_cart');
    
    Route::post('/food/get-table-list','ShoppingCartController@getTableList')->name('food.get-table-list');

    Route::post('user/order/store','OrderController@store')->name('user.order.store');



Auth::routes();


Route::group(['middleware'=> ['auth','user']],function(){
    Route::get('/user/dashboard','FrontendController@userdashboard')->name('user.dashboard');
});

Route::group(['middleware'=> ['auth','admin']],function(){

    Route::get('/admin/dashboard','HomeController@index')->name('admin.dashboard');

    Route::resource('category', ProductCategoryController::class);
    Route::resource('menutype', MenuTypeController::class);
    Route::resource('food', ProductController::class);

    Route::post('food/image/upload/{id}','ProductController@imageupload')->name('food.image.upload');

    Route::resource('reservation', ReservationController::class);
    Route::resource('adminfeedback', FeedbackController::class);


    Route::group(['namespace'=> 'Admin','as'=> 'admin.'],function(){


        Route::get('/order/all', 'OrderController@orderAll')->name('order.all');
        Route::get('/order/cancel', 'OrderController@orderCancel')->name('order.cancel');
        Route::get('/order/confirmed', 'OrderController@orderConfirmed')->name('order.confirmed');
        Route::get('/order/delivered', 'OrderController@orderDelivered')->name('order.delivered');
        Route::get('/order/failed', 'OrderController@orderFailed')->name('order.failed');
        Route::get('/order/outofdelivery', 'OrderController@orderOutofDelivery')->name('order.outofdelivery');
        Route::get('/order/pending', 'OrderController@orderPending')->name('order.pending');
        Route::get('/order/processing', 'OrderController@orderProcessing')->name('order.processing');
        Route::get('/order/returned', 'OrderController@orderReturn')->name('order.returned');


        Route::get('/order/show/{id}', 'OrderController@orderShow')->name('order.show');
        Route::get('/order/billing/{id}', 'OrderController@Billing')->name('order.billing');
        Route::post('/order/status/payment/{id}', 'OrderController@paymentUpdate')->name('payment.update');
        Route::post('/order/status/update/{id}', 'OrderController@orderUpdate')->name('order.update');
    });

});
