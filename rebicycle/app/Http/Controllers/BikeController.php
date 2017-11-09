<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bike;
use App\BikeMedia;
use App\Favorite;
use Carbon\Carbon;
use Validator;
use Auth;
use Redirect;
use File;

class BikeController extends Controller
{
	//Fucntion that makes it possible to post a bike and not yet save it in the database
    public function postBikeData(Request $request){

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

            //We will first temporary save the image before checking if User has already an account
            $images = $request->images;
            $imagesAreTemporary = true;
            $setAlsoMainImage = False;
            $newImagesForExistingBike = False;
            $newTemporaryPath = $this->storeNewBikeMedia($imagesAreTemporary,$images, 0, $setAlsoMainImage, $newImagesForExistingBike);

            //We put all the data about the bike that the user posted in a session
            $bikeData = [
                'brand' => $request->brand,
                'model' => $request->model,
                'category' => $request->category,
                'sellingPrice' => $request->sellingPrice,
                'description' => $request->description,
                'quality' => $request->quality,
                'imagesPath' => $newTemporaryPath,
            ];

            $request->session()->put('bikeData', $bikeData);
            return redirect('/checkIfSellerhasAnAccount');

        } else{
            return Redirect::back()->withErrors($validator);
        }

    }

    public function checkIfSellerhasAnAccount(Request $request){

        $bikeData = $request->session()->get('bikeData');

        if(Auth::check()) {            
            $this->storeNewBike($bikeData);
            return redirect('/myBikes')->with('succesBericht', 'Uw fietszoekertje werd geplaatst');
        } else{
            $request->session()->put('nextPageLink', '/checkIfSellerhasAnAccount');
            return redirect('/login');
            
        }
    }

    public function storeNewBike($bikeData)
    {
    	$bike = new Bike();
        $bikeMedia = new BikeMedia();
        $owner_id = Auth::id();
        $status = 'for sale'; //sellingstatus of the bike that will be sold
        $setAlsoMainImage = True;
        $imagesAreTemporary = false;
        $newImagesForExistingBike = False;

        $bike->brand = $bikeData['brand'];
        $bike->model = $bikeData['model'];
        $bike->category = $bikeData['category'];
        $bike->sellingPrice = $bikeData['sellingPrice'];
        $bike->description = $bikeData['description'];
        $bike->quality = $bikeData['quality'];
        $bike->status = $status;
        $bike->owner_id = $owner_id;
        $bike->save();

        $bike_id = $bike->bike_id;
        $images = File::allFiles($bikeData['imagesPath']);

        $this->storeNewBikeMedia($imagesAreTemporary,$images,$bike_id, $setAlsoMainImage, $newImagesForExistingBike);
        File::deleteDirectory(public_path($bikeData['imagesPath']));       

    }

    public function storeNewBikeMedia($imagesAreTemporary,$images,$bike_id, $setAlsoMainImage, $newImagesForExistingBike){
	
        if(!$imagesAreTemporary){
            if($newImagesForExistingBike){
                //User wants to add new images for existingbike
                foreach ($images as $key =>  $image) {
                    $imageName = 'bike-'.$bike_id.'-'.str_random(5).'.'.$image->getClientOriginalExtension();
                    $newPath = 'img/bikes/';
                    $image->move($newPath, $imageName);
                    $imagePath = $newPath.$imageName;

                    //Add other image in the database
                    $bikeMedia = new BikeMedia();
                    $bikeMedia->path = $imagePath;
                    $bikeMedia->bike_id = $bike_id;
                    $bikeMedia->isMainImage = False;
                    $bikeMedia->save();
                }
            }else{
                //User is logged in, so we move the images from temporaryfolder to the new folder 
                foreach ($images as $key =>  $imagePath) {
                    $image = File::get($imagePath);
                    $imageExtension = File::extension($imagePath);
                    $imageName = 'bike-'.$bike_id.'-'.str_random(5).'.'.$imageExtension;
                    $newPath = 'img/bikes/'.$imageName;
                    File::move($imagePath,$newPath);

                    if($key == 0 && $setAlsoMainImage){
                        //Add image in the database as main image
                        $bikeMedia = new BikeMedia();
                        $bikeMedia->path = $newPath;
                        $bikeMedia->bike_id = $bike_id;
                        $bikeMedia->isMainImage = True;
                        $bikeMedia->save();

                    } else{
                        //Add other image in the database
                        $bikeMedia = new BikeMedia();
                        $bikeMedia->path = $newPath;
                        $bikeMedia->bike_id = $bike_id;
                        $bikeMedia->isMainImage = False;
                        $bikeMedia->save();
                    }
                }
            }
        } else{

            //We move the images in a temporary folder, before we check if the user is logged in
            $currentTime = Carbon::now()->timestamp; //Gives the datetime of this moment in a timestamp
            $newTemporaryPath = 'img/temporaryBikes/'.$currentTime.'-'.str_random(5).'/';

            foreach ($images as $key =>  $image) {
                $regels = array('image' => 'required|image');//|mimes:jpeg,bmp,png,gif,jpg,svg'
                $validator = Validator::make(array('image'=> $image), $regels);

                if($validator->passes()){  

                    $image->move($newTemporaryPath, $image->getClientOriginalName());

                } else{
                    return Redirect::back()->withErrors($validator);
                }
            
            }
            return $newTemporaryPath;
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
        
        $validator = Validator::make($request->all(), [
            'images' => 'required',
            ]);

        if ($validator->passes()){
            $images = $request->images;
            $imagesAreTemporary = False;
            $setAlsoMainImage = False;
            $newImagesForExistingBike = True;

            $this->storeNewBikeMedia($imagesAreTemporary, $images, $bike_id, $setAlsoMainImage, $newImagesForExistingBike);
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
