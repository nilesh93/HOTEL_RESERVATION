<?php

use App\ROOM_TYPE;
use App\HALL;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {


    if(Session::has('room_types') || Session::has('hall_selected'))
    {

        return redirect()->intended('/');
    }
    else{
        return view('Website.Demo');
    }


});

Route::get('/home', function () {


    return view('Website.Demo');
});

Route::get('admin', function () {
    return view('Admin.Demo');
});

Route::get('/admin', function () {
    return view('Admin.Demo');
});



Route::get('/LOL',function(){
    
 
    return view('webmaster');
});



/*
|--------------------------------------------------------------------------
| Rish Routes
|--------------------------------------------------------------------------
|
|
*/

//rooms

Route::get('cancel_reserv','RoomAvailabilityController@cancel_reserv');
Route::get('select_room_add','RoomAvailabilityController@addSelectedRooms');
Route::get('delete_selected_room_type','RoomAvailabilityController@delSelectedRoom_type');
Route::get('loadBooking','RoomAvailabilityController@loadMyBooking');
Route::get('room_packages','PagesController@rooms');
Route::post('room_availability','RoomAvailabilityController@check_room_availability');
Route::get('room_reservation','ReservationController@RoomReservation');



//halls
Route::get('halls','PagesController@halls');
Route::get('hall_availability','HallavailabilityController@check_hall_availability');
Route::get('book_hall_add','HallavailabilityController@book_hall_add');
Route::get('cancel_hall_reserv','HallavailabilityController@cancel_hall_reserv');
Route::get('hall_reserve_final','HallReservationController@HallReservation');




//payment
Route::get('payment',[

    'middleware' => 'auth',

    'uses' =>'PagesController@makePayment']);




/*
|
|
|--------------------------------------------------------------------------
| End Rish Routes
|--------------------------------------------------------------------------
*/






/*
|--------------------------------------------------------------------------
| Nilesh Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('admin_rooms', 'RoomController@rooms');
Route::get('admin_getrooms', 'RoomController@getrooms');
Route::get('admin_getroom_types', 'RoomController@getroom_types');
Route::get('admin_room_add', 'RoomController@room_add');
Route::get('admin_roomtype_add','RoomController@admin_roomtype_add');
Route::get('admin_delete_room_type','RoomController@delete_room_type');
Route::get('admin_getRoomNum','RoomController@admin_getRoomNum');
Route::get('admin_delete_room', 'RoomController@admin_delete_room'); 



Route::get('admin_room_services', 'RoomController@roomservices');
Route::get('admin_get_room_services', 'RoomController@get_room_services');
Route::get('admin_get_room_furnish', 'RoomController@get_room_furnish');
Route::get('admin_room_furnish_add', 'RoomController@room_furnish_add');
Route::get('admin_room_service_add', 'RoomController@room_service_add');
Route::get('admin_getRS_info', 'RoomController@getRS_info');
Route::get('admin_getRF_info', 'RoomController@getRF_info');
Route::get('admin_updateRF','RoomController@updateRF');
Route::get('admin_updateRS','RoomController@updateRS');
Route::get('admin_delRS','RoomController@delRS');
Route::get('admin_delRF','RoomController@delRF');



Route::get('admin_halls','HallController@halls');
Route::get('admin_get_halls','HallController@admin_get_halls');
Route::get('admin_hall_add','HallController@admin_hall_add');
Route::get('admin_delete_hall','HallController@admin_delete_hall');


Route::get('saveinquiry','InquiryController@saveinquiry');
Route::get('menu','MenuControllerWeb@menuMain');

Route::get('/contact',function(){
    return view('Website.contact');
});



/*
|
|
|--------------------------------------------------------------------------
| End Nilesh Routes
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Vishan Routes
|--------------------------------------------------------------------------
|
|
*/

// Register & Login routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// View, Create, Delete Admin level users & Block Customers routes
Route::get('/admin_users', 'UserController@Users');
Route::get('/fill_data', 'UserController@fillData');
Route::get('/block_customer', 'UserController@blockCustomer');
Route::get('/unblock_customer', 'UserController@unblockCustomer');
Route::get('/fill_data_admin', 'UserController@fillAdminData');
Route::post('/new_admin', 'UserController@createNewAdmin');
Route::get('/delete_admin','UserController@deleteAdmin');

// Facebook Login Routes
Route::get('/login/fb', 'Auth\AuthController@redirectToProvider');
Route::get('/login/fb/callback', 'Auth\AuthController@handleProviderCallback');

// User Blocked Notice route
Route::get('/blocked_user', 'UserController@blockNotice');

// Hall Services routes (Controller is from Nilesh, View has been created in ./Resources/nilesh)
Route::get('/hallServices', 'HallController@getHallServices');
Route::get('/getHallServices', 'HallController@getHallServiceData');
Route::get('/addHallService', 'HallController@addHallService');
Route::get('/deleteHallService', 'HallController@deleteHallService');

// Inaccessible views testing route
Route::get('/test', function(){
    return view('emails.newUser');
});

/*
|
|
|--------------------------------------------------------------------------
| End Vishan Routes
|--------------------------------------------------------------------------
*/



/*
|--------------------------------------------------------------------------
| Nipuna Routes
|--------------------------------------------------------------------------
|
|
*/


Route::controller('admin_promotions','PromotionsController');
Route::controller('admin_menus','MenusController');
Route::controller('admin_facilities','FacilitiesController');

Route::get('admin_search/bookings','search_controller@bookings_search');
Route::get('admin_bookings_search','search_controller@bookings_search_index');

Route::get('admin_rooms_search','search_controller@rooms_search_index');
Route::get('admin_search/rooms','search_controller@rooms_search');

Route::get('admin_search/customers','search_controller@customers_search');
Route::get('admin_customers_search','search_controller@customers_search_index');




/*
|
|
|--------------------------------------------------------------------------
| End Nipuna Routes
|--------------------------------------------------------------------------
*/

