<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
   public function getAllMyOrders($user_id)
    {
        return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
            ->join('bikeMedia','bikeMedia.bike_id','=','orders.bike_id')            
            ->where([
            ['orders.buyer_id', '=', $user_id],
            ['bikeMedia.isMainImage','=', True],

            ])
            ->select('bikes.*','orders.status as orderStatus','bikeMedia.path as mediaPath')
            ->get();
    }
}
