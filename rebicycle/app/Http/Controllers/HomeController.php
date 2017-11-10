<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bike;
use App\BikeMedia;
use Redirect;

class HomeController extends Controller
{
    
    //This function opens the homepage
    public function index()
    {
        $bike = new Bike;
        $amountOfBikes = 2;
        $bikes = $bike->getNumberOfBikesInRandomOrder($amountOfBikes);
        return view('welcome',
            [
            'bikes' => $bikes
            ]);
    }

    //This function opens sell a Bike page
    public function sellBike()
    {
        return view('pages/sellBike');
    }

}
