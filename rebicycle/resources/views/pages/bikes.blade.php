@extends('layouts.app')
@section('content')
<!-- <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="container-fluid">
    <form method="post" action="{{ url('applyBikeFilter/') }}">
        {{ csrf_field() }}
        <h4>Zoekterm</h4>
        <input type="text">
        <div class="quality">
            <h4>Minimum kwaliteit</h4>
            <div class="radio-button first">
            <label class="custom-control custom-radio">
                <input id="star1" name="quality" type="radio" class="custom-control-input" value="1">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star1=0;$star1<1;$star1++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
            <div class="radio-button">
            <label class="row">
                <input id="star2" name="quality" type="radio" class="custom-control-input" value="2">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star2=0;$star2<2;$star2++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
            <div class="radio-button">
            <label class="row">
                <input id="star2" name="quality" type="radio" class="custom-control-input" value="3">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star3=0;$star3<3;$star3++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
            <div class="radio-button">
            <label class="row">
                <input id="star2" name="quality" type="radio" class="custom-control-input" value="4">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star4=0;$star4<4;$star4++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
            <div class="radio-button">
            <label class="row">
                <input id="star5" name="quality" type="radio" class="custom-control-input" value="5">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star5=0;$star5<5;$star5++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
        </div>
        <div class="type">
            <div class="form-group">
                <h4>Type</h4>
                <select class="form-control" id="type" name="category">
                    <option></option>
                    <option>Vrouwenfiets</option>
                    <option>Herenfiets</option>
                    <option>Wielerfiets</option>
                    <option>Mountainbike</option>
                    <option>Andere</option>
                </select>
            </div> 
        </div>
        <div class="price">
            <h4>Prijs</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                    <span class="input-group-addon">
                        &euro;
                    </span>
                    <input type="text" name="minimumPrice" class="form-control" aria-label="minimum price" placeholder="min.">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                    <span class="input-group-addon">
                        &euro;
                    </span>
                    <input type="text" name="maximumPrice" class="form-control" aria-label="maximum price" placeholder="max.">
                    </div>
                </div>
            </div>
        </div>
                <button type="submit" class="btn btn-primary btn-lg">Filter toepassen</button>
    </form>
    </div>
</div> -->
<!-- <div class="container">
    <button style="z-index:100;" onclick="openNav()" type="button" class="filter-button btn btn-primary">
        <i class="fa fa-filter fa-fw" aria-hidden="true"></i>&nbsp; Filter
    </button> -->
    <div class="row col-xs-12 col-sm-12 col-md-12">
        <div class="col-xs12 col-sm-3 col-md-3">
        <form method="post" action="{{ url('applyBikeFilter/') }}">
        {{ csrf_field() }}
        <h4>Zoekterm</h4>
        <input type="text">
        <div class="quality">
            <h4>Minimum kwaliteit</h4>
            <div class="radio-button first">
            <label class="custom-control custom-radio">
                <input id="star1" name="quality" type="radio" class="custom-control-input" value="1">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star1=0;$star1<1;$star1++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
            <div class="radio-button">
            <label class="row">
                <input id="star2" name="quality" type="radio" class="custom-control-input" value="2">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star2=0;$star2<2;$star2++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
            <div class="radio-button">
            <label class="row">
                <input id="star2" name="quality" type="radio" class="custom-control-input" value="3">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star3=0;$star3<3;$star3++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
            <div class="radio-button">
            <label class="row">
                <input id="star2" name="quality" type="radio" class="custom-control-input" value="4">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star4=0;$star4<4;$star4++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
            <div class="radio-button">
            <label class="row">
                <input id="star5" name="quality" type="radio" class="custom-control-input" value="5">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">@for($star5=0;$star5<5;$star5++)<i class="fas fa-star"></i>@endfor</span>
            </label>
            </div>
        </div>
        <div class="type">
            <div class="form-group">
                <h4>Type</h4>
                <select class="form-control" id="type" name="category">
                    <option></option>
                    <option>Vrouwenfiets</option>
                    <option>Herenfiets</option>
                    <option>Wielerfiets</option>
                    <option>Mountainbike</option>
                    <option>Andere</option>
                </select>
            </div> 
        </div>
        <div class="price">
            <h4>Prijs</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                    <span class="input-group-addon">
                        &euro;
                    </span>
                    <input type="text" name="minimumPrice" class="form-control" aria-label="minimum price" placeholder="min.">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group">
                    <span class="input-group-addon">
                        &euro;
                    </span>
                    <input type="text" name="maximumPrice" class="form-control" aria-label="maximum price" placeholder="max.">
                    </div>
                </div>
            </div>
        </div>
                <button type="submit" class="btn btn-primary btn-lg">Filter toepassen</button>
    </form>
    </div>
    <div class="col-xs12 col-sm-9 col-md-9">
        <div class="bicycles">
            @foreach($allBikes as $key => $bike)
            <a href="/bike/{{ $bike->bike_id }}">
            <div class="bikeSale col-xs-6 col-sm-6 col-md-4" id="bike">
                    <img class="bike-image" src="{{ asset($bike->mediaPath) }}">
                    <div class="bike-info">
                        <div class="bikeSaleLeft col-xs-12 col-sm-8 col-md-8">
                            <li><h3>{{ $bike->brand }} {{ $bike->model }}</h3></li>
                            <li><span><i class="fal fa-euro-sign"></i> {{ $bike->sellingPrice }}</span></li>
                        </div>
                        <div class="bikeSaleRight col-xs-12 col-sm-4 col-md-4">
                            <ul>
                            @if($bike->favorites()->where('user_id',Auth::id())->get()->isEmpty() )                
                            <a href="/favoriseBike/{{ $bike->bike_id }}"><li><i class="fas fa-heart fa-2x favorited"></i></li></a>
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
    </div>
</div>
@endsection