<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class BikeMedia extends Model
{
    //
    protected $table = 'bikeMedia';
    protected $primaryKey = 'bikeMedia_id';

    public function getBikeMediaWithBikeId($bike_id){
    	return DB::table('bikeMedia')
    	->where('bike_id','=', $bike_id)
    	->get();
    }

    public function getBikeMediaWithBikeMediaId($bikeMedia_id){
    	return DB::table('bikeMedia')
    	->where('bikeMedia_id','=', $bikeMedia_id)
    	->get();
    }

    public function deleteABikeMedia($bikeMedia_id)
    {
        DB::table('bikeMedia')
        ->where('bikeMedia_id', '=', $bikeMedia_id)
        ->delete();
    }
}
