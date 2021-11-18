<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tickets','api\ticketsController@sales_interval');


//sales_intervalのstartとendの間にあるチケットのネームとコード（重複する文分ははぶく）を返す
Route::get('/tickets_code_name','api\ticketsController@sales_interval_ticket_code_name');

////sales_intervalのstartとendの間にあるチケットをさらにチケットコードで抽出し、そのデータのチケット名、チケット紹介内容、注意事項を返す
Route::get('/tickets_ticket_code','api\ticketsController@sales_interval_ticket_code');


//sales_intervalのstartとendの間にあるチケットの[ticket_name contents_data cautions_text]を取得する（チケットコードでも抽出)
Route::get('/tickets_ticket_code_detail','api\ticketsController@sales_interval_ticket_code_detail');

//post チケット登録
Route::post('/tickets/reserve','api\ticketsController@ticket_reserve');
