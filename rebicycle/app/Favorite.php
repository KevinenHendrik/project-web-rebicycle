<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Favorite extends Model
{
    protected $table = 'favorites';
    protected $primaryKey = 'favorite_id';

	public function getAllFavoriteBikes($user_id)
    {
        return DB::table('favorites')
        	->join('bikes','bikes.bike_id','=','favorites.bike_id')
            ->join('bikeMedia','bikeMedia.bike_id','=','favorites.bike_id')            
            ->where([
            ['favorites.user_id', '=', $user_id],
            ['bikeMedia.isMainImage','=', True],

            ])
            ->select('bikes.*','bikeMedia.path as mediaPath')
            ->get();
    }

    //
    public function getFavorite($bike_id, $user_id)
    {
    	return DB::table('favorites')
    	->where('bike_id','=',$bike_id)
    	->where('user_id','=',$user_id)
    	->get();
    }

    public function deleteAFavorite($bike_id, $user_id)
    {
    	DB::table('favorites')
        ->where('bike_id','=',$bike_id)
    	->where('user_id','=',$user_id)
        ->delete();
    }
}
