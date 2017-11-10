@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Winkelmandje</h3>
    <div class="bicycles row">
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
        
    </div>
    <div class="row">
        <div class="col-md-3">
            <h3>Wordt geleverd naar</h3>
            <p>{{ Auth::user()->adres }}</p>
        </div>
        <div class="col-md-8">
            <h3>Bestelling</h3>
                
            <form class="form-horizontal" method="POST" action="/buy">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('quality') ? ' has-error' : '' }}">
                    <label for="quality" class="col-md-4 control-label">Kies een minimum kwailiteitscore voor uw fietsen*</label>

                    <div class="col-md-3">
                        <select id="quality"  class="form-control" name="quality" value="{{ old('quality') }}" required>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>

                        @if ($errors->has('quality'))
                            <span class="help-block">
                                <strong>{{ $errors->first('quality') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-4">
                    <h4>Totale kostprijs: {{  $totalPrice }} euro
                    </h4>
                </div>
                <div class="form-group ">
                        <button type="submit" class="btn btn-primary">
                            Bestelling plaatsen
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection