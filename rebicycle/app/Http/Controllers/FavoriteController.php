<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bike;
use App\Favorite;
use Validator;
use Auth;
use Redirect;

class FavoriteController extends Controller
{
	public function showAllFavoriteBikes(){
        $favorite = new Favorite();
        $user_id = Auth::id();
        $allFavoriteBikes = $favorite->getAllFavoriteBikes($user_id);

        return view('pages/favoriteBikes',
            ['allFavoriteBikes' => $allFavoriteBikes,
            ]);
    }

	public function toggleFavorite($bike_id){
		$favorite = new Favorite();
		$user_id = Auth::id();

		//Check if Favorite already exists
		$favoriteToCheck = $favorite->getFavorite($bike_id, $user_id);

		if (!$favoriteToCheck->isEmpty()){
			//remove Bike from favorite
			$favorite->deleteAFavorite($bike_id, $user_id);
		} else{
			//add Bike to favorite
			$favorite->bike_id = $bike_id;
			$favorite->user_id = $user_id;
			$favorite->save();
		}

	return Redirect::back();

	}


}