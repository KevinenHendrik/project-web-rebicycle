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
                <div class="bicycle-picture col-xs-6 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <img src="{{ asset($imageBike->path) }}" onclick="openModal();currentSlide({{$key+1}})">
                </div>
                @endif
                @endforeach
            </div>
            <div class="details"><h4>Details:</h4>
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
            <img src="{{ asset($imageBike->path) }}">
            @endif
        @endforeach
            <div class="description">
                <h3>Omschrijving:</h3>
                <p> {{ $bikeToShow->description }}</p>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        @foreach ($bikeMediaToShow as $key => $imageBike)
        @if($imageBike->isMainImage)
            <img src="{{ asset($imageBike->path) }}">
        @endif
        @endforeach
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    @foreach ($bikeMediaToShow as $key => $imageBike)
    @if($imageBike->isMainImage)
        <div class="column">
            <img class="demo" src="{{ asset($imageBike->path) }}" onclick="currentSlide({{$key+1}})" alt="foto {{ $bikeToShow->brand }} {{ $bikeToShow->model }}">
        </div>
    @endif
    @endforeach
</div><!-- modal box -->
</div>
<div class="container">
<div class="bicycle-recommended block block-text col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="bicycles">
    <h2 style="text-align:center;background-color:white;" >Misschien is dit iets voor jou?</h2>
    @for($i=0;$i<2;$i++)
    <div class="bikeSale col-xs-6 col-sm-6 col-md-6" id="bike">
    <img src="{{ asset('img/bikes/bike-62-TsOnX.jpg') }}">
    <div class="bike-info">
        <div class="bikeSaleLeft col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <li><h3>trek</h3></li>
            <li><span><i class="fal fa-euro-sign"></i> 500</span></li>
        </div>
        <div class="bikeSaleRight col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <ul>
                <li><i class="fas fa-heart fa-2x favorited"></i></li>
                <li><i class="fal fa-shopping-cart fa-2x"></i></li>
            </ul>
        </div>  
    </div>
</div>
@endfor
    <!-- </a> -->
<a href="/bike">
</div>
</div>
@endsection