@extends('layouts.app')

@section('content')
	<div class="container">
            <h2>Mijn bestellingen</h2>
        @foreach ($allMyOrders as $key => $bike)
            <div class="container">
            	<a href="/bike/{{$bike->bike_id}}">
                    <div class="col-md-2"><img style="width: 100%" src="{{ asset($bike->mediaPath)  }}"></div>
                </a>
            	<div>
            		<a href="/bike/{{$bike->bike_id}}">
                        <h4>{{$bike->brand}}: {{$bike->model}}</h4>
                    </a>
	            	<p>{{$bike->sellingPrice}} euro</p>
                    <p>status: {{$bike->orderStatus}}</p> 	            	
            	</div>
            	
            </div>
        @endforeach
    </div>
@endsection