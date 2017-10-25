@extends('layouts.app')
@section('content')
</div>
<div class="intro">
    <div class="hero-image">
        <div class="title col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h1 class="scroll-object">Rebicycle</h1>
        </div>
        <div class="buttons-hero-image">
            <div class="left col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <a href="/bikes"><button type="button" class="btn btn-outline-primary btn-lg">Kopen</button></a>
            </div>
            <div class="right col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <button type="button" class="btn btn-outline btn-lg">Verkopen</button>
            </div>
        </div>

        <i class="fal fa-chevron-double-down fa-2x"></i>
    </div>
</div>
<div class="container-fluid">
    <div class="block block-text col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <i class="fal fa-euro-sign fa-8x"></i>
            <h3>Rebicycle is een marktplaats voor 2de handsfietsen.</h3>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <i class="fal fa-question-circle fa-8x"></i>
            <h3>Voor al uw vragen kan u terecht bij onze helpdesk of FAQ.</h3>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
        <i class="fal fa-bicycle fa-8x"></i>
        <h3>Elke fiets die je koopt wordt eerst door ons gecontroleerd.</h3>
        </div>
    </div>

    <div class="block block-image col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <h1>Voor ieder wat wils!</h1>
    </div>

    <div class="bicycle-recommended block block-text col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="bicycles">
        <h2 style="text-align:center;background-color:white;" >Misschien is dit iets voor jou?</h2>
        <a href="/bike">
        <div class="bikeSale col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <img src="{{ asset('img/bikes/derek-thomson-271991.jpg') }}">
                <div class="bikeSaleLeft col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <li><h3>Thompson adventure</h3></li>
                    <li><span><i class="fal fa-euro-sign"></i> 360</span></li>
                </div>
                <div class="bikeSaleRight col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <ul>
                        <li><i class="fas fa-heart fa-2x"></i></li>
                        <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                    </ul>
                </div>  
        </div>
        </a>
    <a href="/bike">
    <div class="bikeSale col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <img src="{{ asset('img/bikes/william-hook-58602.jpg') }}">
            <div class="bikeSaleLeft col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                <li><h3>Trek G-70</h3></li>
                <li><span><i class="fal fa-euro-sign"></i> 200</span></li>
            </div>
            <div class="bikeSaleRight col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <ul>
                    <li><i class="fas fa-heart fa-2x"></i></li>
                    <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                </ul>
            </div>  
    </div>
    </a>
    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>
</div>

@endsection