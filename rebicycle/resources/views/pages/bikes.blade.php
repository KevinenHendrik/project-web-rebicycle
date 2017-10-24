@extends('layouts.app')
@section('content')
<div class="container">
    <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
        <div class="">
            <img src="{{ asset('img/bikes/rob-bye-200735.jpg') }}">
            <div class="bikeSaleLeft col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <h3>trek t2</h3>
                <span><i class="fal fa-euro-sign"></i> 200</span>
            </div>
            <div class="bikeSaleRight col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <ul>
                    <li><i class="fas fa-heart fa-2x"></i></li>
                    <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                </ul>
            </div>  
        </div>
    </div>
</div>
@endsection