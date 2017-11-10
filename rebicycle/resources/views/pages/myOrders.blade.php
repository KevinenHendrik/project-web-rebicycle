@extends('layouts.app')

@section('content')
    <h1>Mijn bestellingen</h1>
	   @if(!$allMyNewOrders->isEmpty())
           <div class="container">
                <h2>Mijn nieuwe bestellingen</h2>
                @foreach ($allMyNewOrders as $key => $bike)
                    <div class="container">
                    	<a href="/bike/{{$bike->bike_id}}">
                            <div class="col-md-2"><img style="width: 100%" src="{{ asset($bike->mediaPath)  }}"></div>
                        </a>
                    	<div class="col-md-3">
                    		<a href="/bike/{{$bike->bike_id}}">
                                <h4>{{$bike->brand}}: {{$bike->model}}</h4>
                            </a>
        	            	<p>Verkoopprijs: {{$bike->sellingPrice}} euro</p>
                            <p>status: {{$bike->orderStatus}}</p> 	            	
                    	</div>            	
                    </div>
                @endforeach
            </div>
        @endif
        @if(!$allMyOrdersToPickUp->isEmpty())
            <div class="container">
                    <h2>Op te halen bestellingen</h2>
                @foreach ($allMyOrdersToPickUp as $key => $bike)
                    <div class="container">
                        <a href="/bike/{{$bike->bike_id}}">
                            <div class="col-md-2"><img style="width: 100%" src="{{ asset($bike->mediaPath)  }}"></div>
                        </a>
                        <div class="col-md-3">
                            <a href="/bike/{{$bike->bike_id}}">
                                <h4>{{$bike->brand}}: {{$bike->model}}</h4>
                            </a>
                            <p>Verkoopprijs: {{$bike->sellingPrice}} euro</p>
                            <p>Ophaaldatum: {{$bike->date}}</p>                   
                        </div>              
                    </div>
                @endforeach
            </div>
        @endif
        @if(!$allMyOrdersToDeliver->isEmpty() || !$allMyOrdersToDeliverWithDeliveryOrder->isEmpty())
            <div class="container">
                <h2>Bestellingen te leveren</h2>
                @foreach ($allMyOrdersToDeliver as $key => $bike)
                    <div class="container">
                        <a href="/bike/{{$bike->bike_id}}">
                            <div class="col-md-2"><img style="width: 100%" src="{{ asset($bike->mediaPath)  }}"></div>
                        </a>
                        <div class="col-md-3">
                            <a href="/bike/{{$bike->bike_id}}">
                                <h4>{{$bike->brand}}: {{$bike->model}}</h4>
                            </a>
                            <p>Verkoopprijs: {{$bike->sellingPrice}} euro</p>
                            <p>Ophaaldatum: Nog onbekend</p>                   
                        </div>              
                    </div>
                @endforeach
                @foreach ($allMyOrdersToDeliverWithDeliveryOrder as $key => $bike)
                    <div class="container">
                        <a href="/bike/{{$bike->bike_id}}">
                            <div class="col-md-2"><img style="width: 100%" src="{{ asset($bike->mediaPath)  }}"></div>
                        </a>
                        <div class="col-md-3">
                            <a href="/bike/{{$bike->bike_id}}">
                                <h4>{{$bike->brand}}: {{$bike->model}}</h4>
                            </a>
                            <p>Verkoopprijs: {{$bike->sellingPrice}} euro</p>
                            <p>Ophaaldatum: {{$bike->date}}</p>                   
                        </div>              
                    </div>
                @endforeach
            </div>
        @endif
        @if(!$allMyDeliveredOrders->isEmpty())
            <div class="container">
                    <h2>Afgeronde bestellingen</h2>
                @foreach ($allMyDeliveredOrders as $key => $bike)
                    <div class="container">
                        <a href="/bike/{{$bike->bike_id}}">
                            <div class="col-md-2"><img style="width: 100%" src="{{ asset($bike->mediaPath)  }}"></div>
                        </a>
                        <div class="col-md-3">
                            <a href="/bike/{{$bike->bike_id}}">
                                <h4>{{$bike->brand}}: {{$bike->model}}</h4>
                            </a>
                            <p>Verkoopprijs: {{$bike->sellingPrice}} euro</p>                  
                        </div>              
                    </div>
                @endforeach
            </div>
        @endif
        @if(!$allMyCancelledOrders->isEmpty())
            <div class="container">
                    <h2>Geannuleerde bestellingen</h2>
                @foreach ($allMyCancelledOrders as $key => $bike)
                    <div class="container">
                        <a href="/bike/{{$bike->bike_id}}">
                            <div class="col-md-2"><img style="width: 100%" src="{{ asset($bike->mediaPath)  }}"></div>
                        </a>
                        <div class="col-md-3">
                            <a href="/bike/{{$bike->bike_id}}">
                                <h4>{{$bike->brand}}: {{$bike->model}}</h4>
                            </a>
                            <p>Verkoopprijs: {{$bike->sellingPrice}} euro</p>
                            <p>Reden: Kwaliteit van de fiets was te laag</p>                   
                        </div>              
                    </div>
                @endforeach
            </div>
        @endif

    
@endsection