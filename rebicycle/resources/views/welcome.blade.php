@extends('layouts.app')
@section('content')
<div class="homepage">
<div class="intro">
    <div class="hero-image">
        <div class="title col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h1 class="scroll-object">Rebicycle</h1>
        </div>
        <div class="buttons-hero-image">
            <div class="left col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <a href="/sellBike"><button type="button" class="btn btn-outline btn-lg">Verkopen</button></a>
                </div>
            <div class="right col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <a href="/bikes"><button type="button" class="btn btn-outline-primary btn-lg">Kopen</button></a>
                </div>
        </div>
        <i class="fal fa-chevron-double-down fa-2x" onclick="scrollDown()"></i>
    </div>
</div>
<div class="container">
    <div class="steps">
        <div class="row">
        <div class="col-sm-15 col-md-15">
            <i class="fal fa-truck fa-4x" data-fa-transform="flip-h"></i>
            <p>De fiets wordt bij de verkoper door ons opgehaald.</p>
        </div>
        <div class="col-sm-15 col-md-15">
            <i class="fal fa-list-alt fa-4x"></i>
            <p>Op onze opslagplaats volgt een controle en een opknapbeurt.</p>
        </div>
        <div class="col-sm-15 col-md-15">
            <i class="fal fa-check-circle fa-4x"></i>
            <p>De koper krijgt een certificaat dat de fiets rebicycled is.</p>
        </div>
        <div class="col-sm-15 col-md-15">
            <i class="fal fa-usd-circle fa-4x"></i>
            <p>De verkoper ontvangt zijn geld op een veilige manier.</p>
        </div>
        <div class="col-sm-15 col-md-15">
            <i class="fal fa-truck fa-4x" data-fa-transform="flip-h"></i>
            <p>De fiets wordt geleverd naar een plaats van keuze.</p>
        </div>
        <!-- <div class="link">
            <h3>Toch nog niet helemaal mee? Ontdek hier stap voor stap hoe we te werk gaan.</h3>
        </div> -->
    </div>
    </div>
</div> <!-- end container -->
<div class="container-fluid">
    <div class="block block-image col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h1>Voor ieder wat wils!</h1>
    </div>
</div>
<div class="container">
    <div class="bicycle-recommended block block-text col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="bicycles">
        <h2 style="text-align:center;background-color:white;" >Misschien is dit iets voor jou?</h2>
        @foreach($bikes as $key => $bike)
        <div class="bikeSale col-xs-6 col-sm-6 col-md-6" id="bike">
        <img src="{{ asset( $bike->mediaPath ) }}">
        <div class="bike-info">
            <div class="bikeSaleLeft col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                <li><h3>{{ $bike->brand }}</h3></li>
                <li><span><i class="fal fa-euro-sign"></i> {{ $bike->sellingPrice }}</span></li>
            </div>
            <div class="bikeSaleRight col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <ul>
                    <li><i class="fas fa-heart fa-2x favorited"></i></li>
                    <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                </ul>
            </div>  
        </div>
    </div>
    @endforeach
        <!-- </a> -->
    <a href="/bike">
</div>
</div>
@endsection