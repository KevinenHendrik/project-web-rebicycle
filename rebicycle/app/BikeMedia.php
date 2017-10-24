<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BikeMedia extends Model
{
    //
    protected $table = 'bikeMedia';

    public function getBikeMedia($bike_id){
    	return DB::table('bikeMedia')
    	->where('bike_id','=', $bike_id)
    	->get();
    }
}
