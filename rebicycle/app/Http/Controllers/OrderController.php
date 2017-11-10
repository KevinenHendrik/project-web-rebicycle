<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bike;
use App\Favorite;
use App\Order;
use App\deliveryOrder;
use App\Repair;
use Validator;
use Auth;
use Redirect;

class OrderController extends Controller
{
    public function openMyOrders(){
        $order = new Order;
        $allMyNewOrders = $order->getAllMyNewOrders(Auth::id());
        $allMyOrdersToPickUp = $order->getAllMyOrdersToPickUp(Auth::id());
        $allMyOrdersToDeliver = $order->getAllMyOrdersToDeliver(Auth::id());
        $allMyOrdersToDeliverWithDeliveryOrder = $order->getAllMyOrdersToDeliverWithDeliveryOrder(Auth::id());
        $allMyDeliveredOrders = $order->getAllMyDeliveredOrders(Auth::id());
        $allMyCancelledOrders = $order->getAllMyCancelledOrders(Auth::id());

        return view('pages/myOrders',[
            'allMyNewOrders' => $allMyNewOrders,
            'allMyOrdersToPickUp' => $allMyOrdersToPickUp,
            'allMyOrdersToDeliver' => $allMyOrdersToDeliver,
            'allMyOrdersToDeliverWithDeliveryOrder' => $allMyOrdersToDeliverWithDeliveryOrder,
            'allMyDeliveredOrders' => $allMyDeliveredOrders,
            'allMyCancelledOrders' => $allMyCancelledOrders,

            ]);
    }

    public function openAdminPage(){

        $order = new Order;
        $allNewOrders = $order->getAllNewOrders();
        $allOrdersToPickUp = $order->getAllOrdersToPickUp();
        $allOrdersToDeliver = $order->getAllOrdersToDeliver();
        $allOrdersToDeliverWithDeliveryOrder = $order->getAllOrdersToDeliverWithDeliveryOrder();
        return view('pages/admin',[
                'allNewOrders' => $allNewOrders,
                'allOrdersToPickUp' => $allOrdersToPickUp,
                'allOrdersToDeliver' => $allOrdersToDeliver,
                'allOrdersToDeliverWithDeliveryOrder' => $allOrdersToDeliverWithDeliveryOrder,
            ]);
    }

    public function postPickUpOrder($bike_id, Request $request){

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
        ]);

        if ($validator->passes()){
            $deliveryOrder = new deliveryOrder;
            $deliveryOrder->deliveryDate = $request->date;
            $deliveryOrder->kind = 'pickup';
            $deliveryOrder->destination = 'sellers house';
            $deliveryOrder->status = 'Pickup date chosen';
            $deliveryOrder->bike_id = $bike_id;
            $deliveryOrder->save();

            $order = new Order();
            $order_id = $order->getAnOrder($bike_id)->first()->order_id;
            $orderToEdit = $order::find($order_id); 
            $orderToEdit->status = 'Pickup date chosen';
            $orderToEdit->save();

            return Redirect::back();
        }else{
            return Redirect::back()->withErrors($validator);
        }        


    }

    public function postPickUpOrderData($bike_id, Request $request){

        $validator = Validator::make($request->all(), [
            'quality' => 'required|numeric',
            'repairs' => 'string|nullable',
            'cost' => 'numeric|nullable',
        ]);

        if ($validator->passes()){

            $bike = new Bike;
            $order = new Order;
            $repair = new Repair;
            $deliveryOrder = new deliveryOrder;

            $orderQuality = $order->getAnOrder($bike_id)->first()->minimumQuality;



            if($orderQuality <= $request->quality ){
                $deliveryOrder_id = $deliveryOrder->getAPickUpOrder($bike_id)->first()->deliveryOrder_id;
                $deliveryOrderToEdit = $deliveryOrder::find($deliveryOrder_id); 
                $deliveryOrderToEdit->status = 'Done';
                $deliveryOrderToEdit->save();

                $order_id = $order->getAnOrder($bike_id)->first()->order_id;
                $orderToEdit = $order::find($order_id); 
                $orderToEdit->status = 'Waiting for delivery date';
                $orderToEdit->save();

                $bikeToEdit = $bike::find($bike_id);
                $bikeToEdit->quality = $request->quality;
                $bikeToEdit->save();

                if(!$request->repairs == ''){
                    $repair->repairs = $request->repairs;
                    $repair->costs = $request->cost;
                    $repair->bike_id = $bike_id;
                    $repair->save();
                }

                return Redirect::back();
            }else{
                $deliveryOrder_id = $deliveryOrder->getAPickUpOrder($bike_id)->first()->deliveryOrder_id;
                $deliveryOrderToEdit = $deliveryOrder::find($deliveryOrder_id); 
                $deliveryOrderToEdit->status = 'Low quality';
                $deliveryOrderToEdit->save();

                $order_id = $order->getAnOrder($bike_id)->first()->order_id;
                $orderToEdit = $order::find($order_id); 
                $orderToEdit->status = 'Cancelled due to low quality';
                $orderToEdit->save();

                $bikeToEdit = $bike::find($bike_id);
                $bikeToEdit->quality = $request->quality;
                $bikeToEdit->status = 'for sale';
                $bikeToEdit->save();

                return Redirect::back();

            }

                    
            

            return Redirect::back();
        }else{
            return Redirect::back()->withErrors($validator);
        }        


    }

    public function postDeliveryOrder($bike_id, Request $request){

        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
        ]);

        if ($validator->passes()){
            $deliveryOrder = new deliveryOrder;
            $deliveryOrder->deliveryDate = $request->date;
            $deliveryOrder->kind = 'delivery';
            $deliveryOrder->destination = 'buyers house';
            $deliveryOrder->status = 'Delivery date chosen';
            $deliveryOrder->bike_id = $bike_id;
            $deliveryOrder->save();

            $order = new Order();
            $order_id = $order->getAnOrder($bike_id)->first()->order_id;
            $orderToEdit = $order::find($order_id); 
            $orderToEdit->status = 'Delivery date chosen';
            $orderToEdit->save();

            return Redirect::back();
        }else{
            return Redirect::back()->withErrors($validator);
        }        


    }

    public function setOrderAsDeliverd($bike_id){

            $deliveryOrder = new deliveryOrder;
            $deliveryOrder_id = $deliveryOrder->getADeliveryOrder($bike_id)->first()->deliveryOrder_id;
            $deliveryOrderToEdit = $deliveryOrder::find($deliveryOrder_id); 
            $deliveryOrderToEdit->status = 'Done';
            $deliveryOrderToEdit->save();

            $order = new Order();
            $order_id = $order->getAnOrder($bike_id)->first()->order_id;
            $orderToEdit = $order::find($order_id); 
            $orderToEdit->status = 'Delivered';
            $orderToEdit->save();

            $bike = new Bike;
            $bikeToEdit = $bike::find($bike_id);
            $bikeToEdit->status = 'sold and delivered';
            $bikeToEdit->save();


            return Redirect::back();

    }
}