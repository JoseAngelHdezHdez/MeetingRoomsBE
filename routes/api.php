<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/meeting_rooms', 'MeetingRoomController@index');
Route::get('/meeting_rooms/{meeting_room}/meetings', 'MeetingRoomController@meetingRoomSchedule');
Route::get('/meeting_rooms/{meeting_room}', 'MeetingRoomController@show');
Route::post('/meeting_rooms', 'MeetingRoomController@store');
Route::put('/meeting_rooms/{meeting_room}', 'MeetingRoomController@update');
Route::delete('/meeting_rooms/{meeting_room}', 'MeetingRoomController@destroy');

Route::get('/meetings', 'MeetingController@index');
Route::get('/meetings/{meeting}', 'MeetingController@show');
Route::post('/meetings', 'MeetingController@store');
Route::put('/meetings/{meeting}', 'MeetingController@update');
Route::delete('/meetings/{meeting}', 'MeetingController@destroy');
