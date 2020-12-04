<?php

use App\Http\Controllers\ApiAttendanceController;
use App\Http\Controllers\UssdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
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


$sms_call_back_url = Config::get("app.SMS_INTOUCH_CALL_BACK_URL");
$sms_call_back_url = Str::replaceFirst("/api", "", $sms_call_back_url);
Route::get($sms_call_back_url, "App\Http\Controllers\SmsController@webhook");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("school/attendancy/record", [ApiAttendanceController::class, "record"]);
Route::get("ussd", [UssdController::class, "index"]);
