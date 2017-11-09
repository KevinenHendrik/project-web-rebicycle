<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bike extends Model
{
    protected $primaryKey = 'bike_id';

    public function getAllBikes(){
        return DB::table('bikes')
            ->join('bikeMedia','bikeMedia.bike_id','=','bikes.bike_id')
            ->where([
            ['bikeMedia.isMainImage','=', True],
            ])
            ->select('bikes.*','bikeMedia.path as mediaPath')
            ->get();
    }

    public function getAllMyBikes($owner_id)
    {
    	return DB::table('bikes')
    	->join('bikeMedia','bikeMedia.bike_id','=','bikes.bike_id')
    	->where([
    		['bikes.owner_id', '=', $owner_id],
    		['bikeMedia.isMainImage','=', True],
    		])
        ->select('bikes.*','bikeMedia.path as mediaPath')
        ->get();
    }

    public function getABike($bike_id)
    {
    	return DB::table('bikes')
        ->join('bikeMedia','bikeMedia.bike_id','=','bikes.bike_id')
    	->where('bikes.bike_id','=',$bike_id)
        ->where('bikeMedia.isMainImage','=', True)
    	->get();
    }

    public function deleteABike($bike_id)
    {
        DB::table('bikes')
        ->where('bike_id', '=', $bike_id)
        ->delete();
    }

    public function favorites(){
        return $this->hasMany('App\Favorite','favorite_id');
    }

}
