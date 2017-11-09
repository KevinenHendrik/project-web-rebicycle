@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Winkelmandje</h3>
    <div class="bicycles">
        @foreach($bikesFromShoppingBasket as $key => $bike)
        <a href="/bike/{{ $bike->bike_id }}">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <img src="{{ asset($bike->path) }}">
                <div class="bikeSaleLeft col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <li><h3>{{ $bike->brand }} {{ $bike->model }}</h3></li>
                    <li><span><i class="fal fa-euro-sign"></i> {{ $bike->sellingPrice }}</span></li>
                </div>
                <div class="bikeSaleRight col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <li><i class="fas fa-heart fa-2x"></i></li>
                        <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                    </ul>
                </div>  
        </div>
        </a>
        @endforeach
        <a class="btn btn-primary" href="/buy">Verder naar bestellen</a>
    </div>
</div>
@endsection