@extends('layouts.app')
@section('content')
<div class="container">
<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="/bikes">Bicycles</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $bikeToShow->brand }} {{ $bikeToShow->model }}</li>
  </ol>
</nav>
<div class="bicycle-single">
    <div class="bicycle col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">    
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
            <h1>{{ $bikeToShow->brand }} {{ $bikeToShow->model }}</h1>
            <div class="bicycle col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
                @foreach ($bikeMediaToShow as $key => $imageBike)
                @if($imageBike->isMainImage==false)
                <div class="bicycle-picture col-xs-6 col-sm-6 col-md-6">
                    <img id="imgSmall{{$key}}" src="{{ asset($imageBike->path) }}" onclick="showImageBike(this.src,this.id)">
                </div>
                @endif
                @endforeach
            </div>
            <div class="details">
                <div class="row first-info">
                    <h3>Prijs</h3>
                    <h2>&euro; {{ $bikeToShow->sellingPrice }}</h2>
                </div>
                <h4>Details:</h4>
                <ul>
                    <li class="property">Merk</li>
                    <li class="property-value">Trek</li>
                    <li class="property">Model</li>
                    <li class="property-value">Wielerfiets</li>
                    <li class="property">Type remmen</li>
                    <li class="property-value">Remschijven</li>
                    <li class="property">Versnellingen</li>
                    <li class="property-value">21</li>
                </ul>

            </div>        
        </div>    
        <div class="hero-image col-xs-12 col-sm-8 col-md-9 col-lg-9 col-xl-9">
        @foreach ($bikeMediaToShow as $key => $imageBike)
            @if($imageBike->isMainImage)
            <img id="headImageBike" src="{{ asset($imageBike->path) }}">
            @endif
        @endforeach
        
            <div class="icons">
                @if($bikeToShow->favorites()->where('user_id',Auth::id())->get()->isEmpty() )
                <a href="/favoriseBike/{{ $bikeToShow->bike_id }}"><li>Toevoegen aan favorieten <i class="fas fa-heart fa-3x"></i></li></a>
                @else
                <a href="/unfavoriseBike/{{ $bikeToShow->bike_id }}"><li>Verwijderen van favorieten<i class="fas fa-heart fa-3x favorited"></i></li></a>
                @endif

                <a href="/addBikeToShoppingBasket/{{ $bikeToShow->bike_id }}"><li>Toevoegen aan winkelwagen <i class="fal fa-shopping-cart fa-3x"></i></li></a>
            </div>
            <div class="description">
                <h3>Omschrijving:</h3>
                <p> {{ $bikeToShow->description }}</p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">
<div class="bicycle-recommended block block-text col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="bicycles">
    <h2 style="text-align:center;background-color:white;" >Of wat denk je van deze fietsen?</h2>
    @foreach($randomBikes as $key => $bike)
    <a href="/bike/{{ $bike->bike_id }}">
    <div class="bikeSale col-xs-6 col-sm-6 col-md-6" id="bike">
    <img src="{{ asset( $bike->mediaPath ) }}">
    <div class="bike-info">
        <div class="bikeSaleLeft col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <li><h3>{{ $bike->brand }} {{ $bike->model }}</h3></li>
            <li><span><i class="fal fa-euro-sign"></i> {{ $bike->sellingPrice }}</span></li>
        </div>
        <div class="bikeSaleRight col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <ul>
                @if($bike->favorites()->where('user_id',Auth::id())->get()->isEmpty() )
                    <a href="/favoriseBike/{{ $bike->bike_id }}"><li><i class="fas fa-heart fa-2x"></i></li></a>
                @else
                    <a href="/unfavoriseBike/{{ $bike->bike_id }}"><li><i class="fas fa-heart fa-2x favorited"></i></li></a>
                @endif
                <a href="/addBikeToShoppingBasket/{{ $bike->bike_id }}"><li><i class="fal fa-shopping-cart fa-2x"></i></li></a>
            </ul>
        </div>  
    </div>
</div>
</a>
@endforeach
</div>
</div>

@endsection