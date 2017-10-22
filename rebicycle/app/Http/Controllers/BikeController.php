<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bike;
use App\BikeMedia;
use Validator;
use Auth;
use Redirect;

class BikeController extends Controller
{
	//Fucntion that makes it possible to post a bike on the platform to sell it
    public function storeNewBike(Request $request)
    {
    	$bike = new Bike();
    	$bikeMedia = new BikeMedia();
    	$owner_id = Auth::id();
    	$status = 'for sale'; //sellingstatus of the bike that will be sold

        $validator = Validator::make($request->all(), [
          'brand' => 'required',
          'model' => 'required',
          'category' => 'required',
          'sellingPrice' => 'required',
          'description' => 'required',
          'quality' => 'required',
          'images' => 'required'
        ]);

        if ($validator->passes()){

            $bike->brand = $request->brand;
            $bike->model = $request->model;
            $bike->category = $request->category;
            $bike->sellingPrice = $request->sellingPrice;
            $bike->description = $request->description;
            $bike->quality = $request->quality;
            $bike->status = $status;
            $bike->owner_id = $owner_id;
            $bike->save();

            $bike_id = $bike->id;
            $images = $request->images;
            $this->storeNewBikeMedia($images,$bike_id);
            
            return redirect('/home')->with('succesBericht', 'Uw fietszoekertje werd geplaatst');

        } else{
        		return Redirect::back()->withErrors($validator);
        }
    }

    public function storeNewBikeMedia($images,$bike_id){
	
        foreach ($images as $key =>  $image) {
            $regels = array('image' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
            $validator = Validator::make(array('image'=> $image), $regels);

            if($validator->passes()){  

                $imageName = 'bike-'.$bike_id.'-'.str_random(5).$image->getClientOriginalName();
                $image->move('img/bikes/', $imageName);
                $path = 'img/bikes/'.$imageName;

                if($key == 0){
                    //Add image in the database as main image
                    $bikeMedia = new BikeMedia();
                    $bikeMedia->path = $path;
                    $bikeMedia->bike_id = $bike_id;
                    $bikeMedia->isMainImage = True;
                    $bikeMedia->save();

                } else{
                    //Add other image in the database
                    $bikeMedia = new BikeMedia();
                    $bikeMedia->path = $path;
                    $bikeMedia->bike_id = $bike_id;
                    $bikeMedia->isMainImage = False;
                    $bikeMedia->save();
                }

            } else{
            	return Redirect::back()->withErrors($validator);
            }
        
        } 
    }
}
