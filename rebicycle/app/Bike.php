<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Bike extends Model
{
    protected $primaryKey = 'bike_id';

    public function getNumberOfBikesInRandomOrder($amountOfBikes){
         return DB::table('bikes')
            ->join('bikeMedia','bikeMedia.bike_id','=','bikes.bike_id')
            ->where('bikeMedia.isMainImage','=', True)
            ->where('bikes.status','=', 'for sale')
            ->select('bikes.*','bikeMedia.path as mediaPath')
            ->inRandomOrder()
            ->take($amountOfBikes)
            ->get();
    }

    public function getAllBikes(){
        return DB::table('bikes')
            ->join('bikeMedia','bikeMedia.bike_id','=','bikes.bike_id')
            ->where([
            ['bikeMedia.isMainImage','=', True],
            ['bikes.status','=', 'for sale'],
            ])
            ->select('bikes.*','bikeMedia.path as mediaPath')
            ->get();
    }

    public function getBikesWithFilter($quality, $category, $minimumPrice, $maximumPrice){
        return DB::table('bikes')
            ->join('bikeMedia','bikeMedia.bike_id','=','bikes.bike_id')
            ->where('bikeMedia.isMainImage','=', True)
            ->where('bikes.status','=', 'for sale')
            ->where('bikes.quality','>=',$quality)
            ->where('bikes.category','=',$category)
            ->where('bikes.sellingPrice','>=',$minimumPrice)
            ->where('bikes.sellingPrice','<=',$maximumPrice)
            ->select('bikes.*','bikeMedia.path as mediaPath')
            ->get();
    }

    public function getAllMyBikes($owner_id)
    {
    	return DB::table('bikes')
    	->join('bikeMedia','bikeMedia.bike_id','=','bikes.bike_id')
        ->leftJoin('repairs', 'repairs.bike_id', '=', 'bikes.bike_id')
    	->where([
    		['bikes.owner_id', '=', $owner_id],
    		['bikeMedia.isMainImage','=', True],
    		])
        ->select('bikes.*','bikeMedia.path as mediaPath','repairs.costs as costs')
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
        return $this->hasMany('App\Favorite','bike_id');
    }

}
