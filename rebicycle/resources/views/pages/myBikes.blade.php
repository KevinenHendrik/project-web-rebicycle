@extends('layouts.app')

@section('content')
	<div class="container">
            <h2>Mijn zoekertjes</h2>
        @foreach ($myBikes as $key => $bike)
            <div class="row">
            	<a href="/bike/{{$bike->bike_id}}">
                    <div class="col-md-2"><img style="width: 100%" src="{{ asset($bike->mediaPath)  }}"></div>
                </a>
            	<div class="col-md-3">
            		<a href="/bike/{{$bike->bike_id}}">
                        <h4>{{$bike->brand}}: {{$bike->model}}</h4>
                    </a>
	            	<p>{{$bike->sellingPrice}} euro</p>
                    <p>Status: {{$bike->status}}</p>	            	
	            	
            	</div>
                @if ($bike->status == 'for sale' )
                    <div class="col-md-3">
                        <a class="btn btn-danger" href="/deleteMyBike/{{$bike->bike_id}}">Verwijderen</a>
                        <a class="btn btn-primary" href="/editMyBike/{{$bike->bike_id}}">Wijzigen</a>
                    </div>
                @endif
            	
            </div>
        @endforeach
    </div>
@endsection