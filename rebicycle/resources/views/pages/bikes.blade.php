@extends('layouts.app')
@section('content')
<div class="container">
    <div class="bicycles">
        <div class="bikeSale col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                <img src="{{ asset('img/bikes/rob-bye-200735.jpg') }}">
                <div class="bikeSaleLeft col-9 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <li><h3>Trek 2 mountain</h3></li>
                    <li><span><i class="fal fa-euro-sign fa-2x"></i> 200</span></li>
                </div>
                <div class="bikeSaleRight col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <ul>
                        <li><i class="fas fa-heart fa-2x"></i></li>
                        <li><i class="fal fa-shopping-cart fa-2x"></i></li>
                    </ul>
                </div>  
        </div>
    </div>
</div>
@endsection