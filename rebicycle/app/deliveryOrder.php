<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;



class deliveryOrder extends Model
{
    //
    protected $table = 'deliveryOrders';
    protected $primaryKey = 'deliveryOrder_id';

    public function getAPickUpOrder($bike_id){
    	return DB::table('deliveryOrders')
			->where('deliveryOrders.bike_id','=',$bike_id)
			->get();
    }

    public function getADeliveryOrder($bike_id){
    	return DB::table('deliveryOrders')
			->where('deliveryOrders.bike_id','=',$bike_id)
			->where('deliveryOrders.kind','=','delivery')
			->get();
    }

    
}
