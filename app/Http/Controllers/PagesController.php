<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\HALL;
use App\ROOM_TYPE;

class PagesController extends Controller
{
    //
     public function halls(){

         $halls = HALL::get();
         return view('Website.Halls',["halls"=>$halls]);
     }

    public function rooms(){

        $room_types = ROOM_TYPE::get();

        return view('Website.Room_Packages',["room_types"=>$room_types]);
    }

    public function available_rooms(){

        $room_types = ROOM_TYPE::get();


        return view('Website.Rooms_availability',["room_types"=>$room_types]);
    }
}
