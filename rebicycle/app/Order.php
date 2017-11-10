<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
	protected $primaryKey = 'order_id';

	public function getAnOrder($bike_id){
		return DB::table('orders')
			->where('orders.bike_id','=',$bike_id)
			->get();
	}

   public function getAllMyNewOrders($user_id)
    {
        return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
            ->join('bikeMedia','bikeMedia.bike_id','=','orders.bike_id')            
            ->where([
            ['orders.buyer_id', '=', $user_id],
            ['bikeMedia.isMainImage','=', True],
            ['orders.status','=', 'Waiting for pickupdate'],
            ])
            ->select('bikes.*','orders.status as orderStatus','bikeMedia.path as mediaPath')
            ->get();
    }

    public function getAllMyOrdersToPickUp($user_id)
    {
        return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
            ->join('bikeMedia','bikeMedia.bike_id','=','orders.bike_id')            
        	->join('deliveryOrders','deliveryOrders.bike_id','=','bikes.bike_id')            
            ->where([
            ['orders.buyer_id', '=', $user_id],
            ['bikeMedia.isMainImage','=', True],
            ])
            ->where('deliveryOrders.status','=','Pickup date chosen')
            ->select('bikes.*','orders.status as orderStatus','bikeMedia.path as mediaPath','deliveryOrders.deliveryDate as date')
            ->get();
    }

    public function getAllMyOrdersToDeliver($user_id)
    {
        return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
            ->join('bikeMedia','bikeMedia.bike_id','=','orders.bike_id')            
        	->join('deliveryOrders','deliveryOrders.bike_id','=','bikes.bike_id')            
            ->where([
            ['orders.buyer_id', '=', $user_id],
            ['bikeMedia.isMainImage','=', True],
            ])
            ->where('orders.status','=','Waiting for delivery date')
            ->select('bikes.*','orders.status as orderStatus','bikeMedia.path as mediaPath')
            ->get();
    }

    public function getAllMyOrdersToDeliverWithDeliveryOrder($user_id)
    {
        return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
            ->join('bikeMedia','bikeMedia.bike_id','=','orders.bike_id')            
        	->join('deliveryOrders','deliveryOrders.bike_id','=','bikes.bike_id')            
            ->where([
            ['orders.buyer_id', '=', $user_id],
            ['bikeMedia.isMainImage','=', True],
            ])
            ->where('deliveryOrders.status','=','Delivery date chosen')
            ->select('bikes.*','orders.status as orderStatus','bikeMedia.path as mediaPath','deliveryOrders.deliveryDate as date')
            ->get();
    }

    public function getAllMyDeliveredOrders($user_id)
    {
        return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
            ->join('bikeMedia','bikeMedia.bike_id','=','orders.bike_id')            
            ->where([
            ['orders.buyer_id', '=', $user_id],
            ['bikeMedia.isMainImage','=', True],
            ['orders.status','=', 'Delivered'],
            ])
            ->select('bikes.*','orders.status as orderStatus','bikeMedia.path as mediaPath')
            ->get();
    }

    public function getAllMyCancelledOrders($user_id)
    {
        return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
            ->join('bikeMedia','bikeMedia.bike_id','=','orders.bike_id')            
            ->where([
            ['orders.buyer_id', '=', $user_id],
            ['bikeMedia.isMainImage','=', True],
            ['orders.status','=', 'Cancelled due to low quality'],
            ])
            ->select('bikes.*','orders.status as orderStatus','bikeMedia.path as mediaPath')
            ->get();
    }

    public function getAllNewOrders()
    {
        return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
        	->join('users','users.id','=','bikes.owner_id')
            ->select('bikes.*','orders.status as orderStatus','orders.minimumQuality as minimumQuality','users.name as sellerName','users.firstName as sellerFirstName','users.adres as sellerAdres')
            ->where('orders.status','=','Waiting for pickupdate')
            ->get();
    }

    public function getAllOrdersToPickUp(){
    	return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
        	->join('users','users.id','=','bikes.owner_id')
        	->join('deliveryOrders','deliveryOrders.bike_id','=','bikes.bike_id')
            ->select('bikes.*','orders.status as orderStatus','orders.minimumQuality as minimumQuality','users.name as sellerName','users.firstName as sellerFirstName','users.adres as sellerAdres','deliveryOrders.deliveryDate as date')
            ->where('deliveryOrders.status','=','Pickup date chosen')
            ->get();

    }
    public function getAllOrdersToDeliver(){
    	return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
        	->join('users','users.id','=','orders.buyer_id')
            ->select('bikes.*','users.name as buyerName','users.firstName as buyerFirstName','users.adres as buyerAdres')
            ->where('orders.status','=','Waiting for delivery date')
            ->get();

    }

    public function getAllOrdersToDeliverWithDeliveryOrder(){
    	return DB::table('orders')
        	->join('bikes','bikes.bike_id','=','orders.bike_id')
        	->join('users','users.id','=','orders.buyer_id')
        	->join('deliveryOrders','deliveryOrders.bike_id','=','bikes.bike_id')
            ->select('bikes.*','users.name as buyerName','users.firstName as buyerFirstName','users.adres as buyerAdres','deliveryOrders.deliveryDate as date')
            ->where('deliveryOrders.status','=','Delivery date chosen')
            ->get();
    }



}
