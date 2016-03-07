<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use DateTime;

/**
 * Class SearchController
 * @package App\Http\Controllers
 */
class SearchController extends Controller
{
    /**
     * Constructor for the SearchController class. Checks if a user has sufficient permission
     * to access the Admin area.
     *
     */
    public function __construct()
    {
        // Check if User is Authenticated
        $this->middleware('auth', ['except' => ['blockNotice']]);

        // Check if the authenticated user is an admin
        $this->middleware('isAdmin', ['except' => ['blockNotice']]);
    }
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
     * Returns the bookings search view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bookings_search_index(){
        return view('nipuna.searchbooking');
    }

    /**
     * Returns all the room reservations as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function bookings_search(){
        $result = DB::table('room_reservation')->get();
        return response()->json(['count' => count($result), 'data' => $result]);
    }


    /**
     * Returns the room search view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function rooms_search_index(){
         return view('nipuna.searchroom');
    }

    /**
     * Returns all the available rooms as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function rooms_search(){
        $result = DB::table('rooms')->get();
        return response()->json(['count' => count($result), 'data' => $result]);
    }

    /**
     * Returns the search customer view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function customers_search_index(){
        return view('nipuna.searchcustomer');
    }

    /**
     * Returns all the customers as a JSON response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function customers_search(){
        $result = DB::table('customer')->get();
        return response()->json(['count' => count($result), 'data' => $result]);
    }

    public function roomlogspast(){
        $today = new DateTime();
        $result = DB::table('room_reservation')->where('check_in','<',$today)->get();
        return response()->json(['count' => count($result), 'data' => $result]);
    }

    public function roomlogsfuture(){
        $today = new DateTime();
        $result = DB::table('room_reservation')->where('check_in','>',$today)->get();
        return response()->json(['count' => count($result), 'data' => $result]);
    }
}
