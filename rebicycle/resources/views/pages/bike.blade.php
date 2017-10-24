@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb" role="navigation">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="/bikes">Bicycles</a></li>
    <li class="breadcrumb-item active" aria-current="page">Trek</li>
  </ol>
</nav>
<div class="bicycle-single">
    <div class="bicycle col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">    
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 col-xl-3">
            <h1>Trek model mountainbike 360</h1>
            <div class="bicycle-picture col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <img src="{{ asset('img/bikes/rob-bye-200735.jpg') }}">
            </div>
            <div class="bicycle-picture col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <img src="{{ asset('img/bikes/rob-bye-200735.jpg') }}">
            </div>
            <div class="bicycle-picture col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <img src="{{ asset('img/bikes/rob-bye-200735.jpg') }}">
            </div>
            <div class="bicycle-picture col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <img src="{{ asset('img/bikes/rob-bye-200735.jpg') }}">
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
            <img src="{{ asset('img/bikes/rob-bye-200735.jpg') }}">
            <div class="description">
                <h3>Omschrijving:</h3>
                <p>Prachtig en zo goed als nieuwe mountainbike van Trek. Vlotte lichte aluminium fiets (superfly). Maat voor personen tot 1.85 m ongeveer. Fiets is van november 2016. Ik verkoop hem aangezien ik er geen tijd voor heb.</p>
            </div>
        </div>
    </div>
</div>
<div class="bicycle-recommended block block-text col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <h2>Misschien is dit iets voor jou?</h2>
        <div class="bicycles">
        <a href="/bike">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <img src="{{ asset('img/bikes/derek-thomson-271991.jpg') }}">
                <div class="bikeSaleLeft col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
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
    <div class="bikeSale col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            <img src="{{ asset('img/bikes/william-hook-58602.jpg') }}">
            <div class="bikeSaleLeft col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
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