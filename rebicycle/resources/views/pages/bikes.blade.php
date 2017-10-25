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
        <a href="/bike">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <img src="{{ asset('img/bikes/rob-bye-200735.jpg') }}">
                <div class="bikeSaleLeft col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <li><h3>Trek 2 mountain</h3></li>
                    <li><span><i class="fal fa-euro-sign"></i> 200</span></li>
                </div>
                <div class="bikeSaleRight col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <li><i class="fas fa-heart fa-2x"></i></li>
                        <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                    </ul>
                </div>  
        </div>
        </a>

        <a href="/bike">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <img src="{{ asset('img/bikes/alisa-anton-56158.jpg') }}">
                <div class="bikeSaleLeft col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <li><h3>Gazelle dames</h3></li>
                    <li><span><i class="fal fa-euro-sign"></i> 150</span></li>
                </div>
                <div class="bikeSaleRight col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <li><i class="fas fa-heart fa-2x"></i></li>
                        <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                    </ul>
                </div>  
        </div>
        </a>

        <a href="/bike">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <img src="{{ asset('img/bikes/andrik-langfield-petrides-289817.jpg') }}">
                <div class="bikeSaleLeft col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <li><h3>Oxford heren</h3></li>
                    <li><span><i class="fal fa-euro-sign"></i> 80</span></li>
                </div>
                <div class="bikeSaleRight col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <li><i class="fas fa-heart fa-2x"></i></li>
                        <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                    </ul>
                </div>  
        </div>
        </a>

        <a href="/bike">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <img src="{{ asset('img/bikes/derek-thomson-271991.jpg') }}">
                <div class="bikeSaleLeft col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <li><h3>Thompson adventure</h3></li>
                    <li><span><i class="fal fa-euro-sign"></i> 360</span></li>
                </div>
                <div class="bikeSaleRight col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <li><i class="fas fa-heart fa-2x"></i></li>
                        <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                    </ul>
                </div>  
        </div>
        </a>

        <a href="/bike">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <img src="{{ asset('img/bikes/florian-klauer-147.jpg') }}">
                <div class="bikeSaleLeft col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <li><h3>Kinderfiets</h3></li>
                    <li><span><i class="fal fa-euro-sign"></i> 35</span></li>
                </div>
                <div class="bikeSaleRight col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <li><i class="fas fa-heart fa-2x"></i></li>
                        <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                    </ul>
                </div>  
        </div>
        </a>

        <a href="/bike">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <img src="{{ asset('img/bikes/william-hook-58602.jpg') }}">
                <div class="bikeSaleLeft col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                    <li><h3>Trek G-70</h3></li>
                    <li><span><i class="fal fa-euro-sign"></i> 200</span></li>
                </div>
                <div class="bikeSaleRight col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                    <ul>
                        <li><i class="fas fa-heart fa-2x"></i></li>
                        <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                    </ul>
                </div>  
        </div>
        </a>
    </div>
</div>
@endsection