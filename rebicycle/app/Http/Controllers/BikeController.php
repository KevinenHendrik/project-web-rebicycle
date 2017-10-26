<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bike;
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
        $setAlsoMainImage = True;

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

            $bike_id = $bike->bike_id;
            $images = $request->images;
            $this->storeNewBikeMedia($images,$bike_id, $setAlsoMainImage);
            
            return redirect('/myBikes')->with('succesBericht', 'Uw fietszoekertje werd geplaatst');

        } else{
        		return Redirect::back()->withErrors($validator);
        }
    }

    public function storeNewBikeMedia($images,$bike_id, $setAlsoMainImage){
	
        foreach ($images as $key =>  $image) {
            $regels = array('image' => 'required');//|mimes:jpeg,bmp,png,gif,jpg,svg'
            $validator = Validator::make(array('image'=> $image), $regels);

            if($validator->passes()){  

                $imageName = 'bike-'.$bike_id.'-'.str_random(5).$image->getClientOriginalName();
                $image->move('img/bikes/', $imageName);
                $path = 'img/bikes/'.$imageName;

                if($key == 0 && $setAlsoMainImage){
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

    public function showAllBikes(){
        $bike = new Bike();
        $allBikes = $bike->getAllBikes();

        return view('pages/bikes',
            ['allBikes' => $allBikes,
            ]);
    }

    public function openABike($bike_id){
        $bike = new Bike();
        $bikeToShow = $bike->getABike($bike_id)->first();

        $bikeMedia = new BikeMedia();
        $bikeMediaToShow = $bikeMedia->getBikeMediaWithBikeId($bike_id);

        return view('pages/bike',
            [
            'bikeToShow' => $bikeToShow,
            'bikeMediaToShow' => $bikeMediaToShow,
            ]);
    }

    public function showMyBikes(){
    	$bike = new Bike();
    	$owner_id = Auth::id();
    	$myBikes = $bike->getAllMyBikes($owner_id);

    	return view('pages/myBikes',
            ['myBikes' => $myBikes,
            ]);
    }

    public function openEditMyBike($bike_id){
    	$bike = new Bike();
    	$bikeMedia = new BikeMedia();
    	$bikeToEdit = $bike->getABike($bike_id)->first();
    	$bikeMediaToShow = $bikeMedia->getBikeMediaWithBikeId($bike_id);

    	return view('pages/editMyBike',
    		[
    		'bike' => $bikeToEdit,
    		'bikeMedia' => $bikeMediaToShow,
    		]);
    }
    
    public function editMyBike(Request $request, $bike_id){
        $bike = new Bike();

         $validator = Validator::make($request->all(), [
          'brand' => 'required',
          'model' => 'required',
          'category' => 'required',
          'sellingPrice' => 'required',
          'description' => 'required',
          'quality' => 'required'
        ]);

        if ($validator->passes()){
            $bikeToEdit = $bike::find($bike_id);
            $bikeToEdit->brand = $request->brand;
            $bikeToEdit->model = $request->model;
            $bikeToEdit->category = $request->category;
            $bikeToEdit->description = $request->description;
            $bikeToEdit->quality = $request->quality;
            $bikeToEdit->save();

            return Redirect::back()->with('succesMessage','Uw fietszoekertje werd gewijzigd.');

        }
        else
        {
            return Redirect::back()->withErrors($validator);
        }


    }

    public function deleteMyBike($bike_id){
        $bike = new Bike();
        $bikeMedia = new BikeMedia();

        $bikeMediaToDelete = $bikeMedia->getBikeMediaWithBikeId($bike_id);

        foreach ($bikeMediaToDelete as $media) {
            $filePath = $media->path;
            unlink($filePath);
        }

        $bike->deleteABike($bike_id);

        return redirect('/myBikes');
    }

    public function addBikeMedia(Request $request, $bike_id){
        $setAlsoMainImage = False;
        $validator = Validator::make($request->all(), [
            'images' => 'required',
            ]);

        if ($validator->passes()){
            $images = $request->images;
            $this->storeNewBikeMedia($images, $bike_id, $setAlsoMainImage);
            return Redirect::back()->with('succesMessage','Uw fietszoekertje werd gewijzigd.');
        }
        else{
            return Redirect::back()->withErrors($validator);
        }
        
    }

    public function deleteBikeMedia($bikeMedia_id){

        $bikeMedia = new bikeMedia();
        $bikeMediaToDelete = $bikeMedia->getBikeMediaWithBikeMediaId($bikeMedia_id)->first();

        if($bikeMediaToDelete->isMainImage){
            return Redirect::back()->with('mainImageNotification','Een hoofdafbeelding kan niet verwijderd worden. Stel eerst een ander afbeelding in als hoofdafbeelding.');
        }

        $filePath = $bikeMediaToDelete->path;
        $bikeMedia->deleteABikeMedia($bikeMedia_id);
        unlink($filePath);     
        
        return Redirect::back();
    }

    public function setAsMainImage($bikeMedia_id){
        $bikeMedia = new BikeMedia();
        $bikeMediaToEdit = $bikeMedia::find($bikeMedia_id);
        $bike_id = $bikeMediaToEdit->bike_id;
        $allBikeMedia = $bikeMedia->getBikeMediaWithBikeId($bike_id);
        foreach ($allBikeMedia as $key => $media) {
            if ($media->isMainImage){
                $bikeMediaToReset_id = $media->bikeMedia_id;
                $bikeMedia = new BikeMedia();
                $bikeMediaToReset = $bikeMedia::find($bikeMediaToReset_id);
                $bikeMediaToReset->isMainImage = False;
                $bikeMediaToReset->save();
            }
        }

        $bikeMediaToEdit->isMainImage = True;
        $bikeMediaNotToReset_id = $bikeMediaToEdit->bikeMedia_id;
        $bikeMediaToEdit->save();

        return Redirect::back();
    }
}
