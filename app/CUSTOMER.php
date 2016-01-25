<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class CUSTOMER extends Model
{
    /*
|--------------------------------------------------------------------------
| Laravel Default Model Overrides
|--------------------------------------------------------------------------
|
|
*/
    protected $table = 'CUSTOMER';
    protected $primaryKey = 'cus_id';
 
    public $timestamps  = false;
    protected $fillable = [
        'name',
        'NIC/passport_num',
        'email',
        'telephone_num',
        'block_status',
        'address_line_1',
        'address_line_2',
        'city',
        'provicnce/state',
        'zip_code',
        'country'
    ];
    public $timestamps = false;
    
    
/*
|
|
|--------------------------------------------------------------------------
| End Laravel Default Model Overrides
|--------------------------------------------------------------------------
*/
    
    
    
/*
|--------------------------------------------------------------------------
| Rishan Model Functions
|--------------------------------------------------------------------------
|
|
*/
    
    public function ROOM_RESERVATION()
    {
        return $this->hasMany('App\ROOM_RESERVATION','room_reservation_id');
  }
}






/*
|
|
|--------------------------------------------------------------------------
| End Rishan Model Functions
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Vishan Model Functions
|--------------------------------------------------------------------------
|
|
*/





/*
|
|
|--------------------------------------------------------------------------
| End Vishan Model Functions
|--------------------------------------------------------------------------
*/
