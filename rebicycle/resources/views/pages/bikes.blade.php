@extends('layouts.app')
@section('content')
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h3>Filters in progress...</h3>
    <h4>Prijs:</h4>
    <div id="slidecontainer">
        <input type="range" min="1" max="1000" value="1000" class="slider" id="pricerange">
        <p>prijs: <span id="price"></span></p>
    </div>
    <h4>Type:</h4>
        <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Maak uw keuze
      </button>
        <div class="dropdown-menu">
            <li>Wielerfiets</li>
            <li>Mountainbike</li>
            <li>Tandem</li>
            <li>Andere</li>
        </div>
    </div>
    <h4>Kwaliteit:</h4>
    <div id="slidecontainer">
        <input type="range" min="1" max="10" value="100" class="slider" id="qualityRange">
        <p>Score: <span id="quality"></span></p>
    </div>
  <h4>Merk:</h4>
  <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Maak uw keuze
      </button>
        <div class="dropdown-menu">
            <li>Trek</li>
            <li>Gazelle</li>
            <li>Oxford</li>
            <li>Andere</li>
        </div>
    </div>
</div>
<div class="container">
    <button onclick="openNav()" type="button" class="filter-button btn btn-primary">
        <i class="fa fa-filter fa-fw" aria-hidden="true"></i>&nbsp; Filter
    </button>
    <div class="bicycles">
        @foreach($allBikes as $key => $bike)
        <a href="/bike/{{ $bike->bike_id }}">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <img src="{{ asset($bike->mediaPath) }}">
                <div class="bike-info">
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
        </div>
        </a>
        @endforeach
    </div>
</div>
@endsection