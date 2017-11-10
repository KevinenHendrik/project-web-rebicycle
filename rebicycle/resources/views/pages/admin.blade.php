@extends('layouts.app')

@section('content')
	<div class="container">
        <h2>Admin</h2>
        <div class="container">
            <h4>Nieuwe fietsbestellingen</h4>
            <table class="table table-hover">
            <thead>
              <tr>
              <th></th>
                <th>Merk en model</th>
                <th>Naam Verkoper</th>
                <th>Ophaaladres</th>
                <th>Status</th>
                <th>Verkoopprijs</th>
                <th>Minimum Kwaliteit</th>
                <th>Kies een ophaalmoment</th>
              </tr>
            </thead>
            <tbody>
                @foreach($allNewOrders as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <p>{{$order->brand}} {{$order->model}}</p>
                            </td>
                            <td>
                                <p>{{$order->sellerFirstName}} {{$order->sellerName}}</p>
                            </td>
                            <td>
                                <p>{{$order->sellerAdres}}</p>
                            </td>
                            <td>
                                <p>{{$order->orderStatus}}</p>
                            </td>
                            <td>
                                {{$order->sellingPrice}}                       
                            </td>
                            <td>
                                {{$order->minimumQuality}}                       
                            </td>
                            <td>
                                <form class="form-horizontal" method="POST" action="postPickUpOrder/{{$order->bike_id}}">
                                    <div class="form-group row">                                
                                    {{ csrf_field() }}
                                      <div class="col-10">
                                        <input class="form-control" type="date" value="" name="date" id="date">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">
                                                Ophaalmoment kiezen
                                            </button>
                                        </div>
                                    </div>
                                </form>                                
                            </td>
                        </tr>
                @endforeach
            </tbody>
          </table>
          @if($allNewOrders->isEmpty())
            <p>Er zijn nog geen nieuwe fietsbestellingen.</p>
            @endif
        </div>
        <div class="container">
            <h4>Ophaalorders</h4>
            <table class="table table-hover">
            <thead>
              <tr>
              <th></th>
                <th>Afhaaldatum</th>
                <th>Merk en model</th>
                <th>Naam Verkoper</th>
                <th>Ophaaladres</th>
                <th>Verkoopprijs</th>
                <th>Minimum Kwaliteit</th>
              </tr>
            </thead>
            <tbody>
                @foreach($allOrdersToPickUp as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <p>{{$order->date}}</p>
                            </td>
                            <td>
                                <p>{{$order->brand}} {{$order->model}}</p>
                            </td>
                            <td>
                                <p>{{$order->sellerFirstName}} {{$order->sellerName}}</p>
                            </td>
                            <td>
                                <p>{{$order->sellerAdres}}</p>
                            </td>
                            <td>
                                {{$order->sellingPrice}}                       
                            </td>
                            <td>
                                {{$order->minimumQuality}}                       
                            </td>
                            <td>
                                <form class="form-horizontal" method="POST" action="postPickUpOrderData/{{$order->bike_id}}">
                                    <div class="form-group row">                                
                                    {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('quality') ? ' has-error' : '' }}">
                                            <label for="quality" class="col-md-4 control-label">Kwaliteitsscore*</label>
                                            <div class="col-md-6">
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
                                    </div>
                                    <div class="form-group{{ $errors->has('repairs') ? ' has-error' : '' }}">
                                        <label for="repairs" class="col-md-4 control-label">Reparaties (enkel bij min. kwaliteit <= werkelijke kwaliteit)</label>

                                        <div class="col-md-6">
                                            <input id="repairs" type="text" class="form-control" name="repairs" value=""  autofocus>

                                            @if ($errors->has('repairs'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('repairs') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('cost') ? ' has-error' : '' }}">
                                        <label for="cost" class="col-md-4 control-label">Reparatiekosten</label>

                                        <div class="col-md-6">
                                            <input id="cost" type="text" class="form-control" name="cost" value="" autofocus>

                                            @if ($errors->has('cost'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('cost') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">
                                                Ophaalgegevens versturen
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                            </td>
                        </tr>
                @endforeach
            </tbody>
          </table>
          @if($allOrdersToPickUp->isEmpty())
                <p>Er zijn nog geen nieuwe ophaalorders</p>
            @endif
        </div>
        <div class="container">
            <h4>Leveringen zonder leverdatum</h4>
            <table class="table table-hover">
            <thead>
              <tr>
              <th></th>
                <th>Merk en model</th>
                <th>Naam Koper</th>
                <th>Bestemming</th>
                <th>Kies een leverdatum</th>
              </tr>
            </thead>
            <tbody>
                @foreach($allOrdersToDeliver as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <p>{{$order->brand}} {{$order->model}}</p>
                            </td>
                            <td>
                                <p>{{$order->buyerFirstName}} {{$order->buyerName}}</p>
                            </td>
                            <td>
                                <p>{{$order->buyerAdres}}</p>
                            </td>
                            <td>
                                <form class="form-horizontal" method="POST" action="postDeliveryOrder/{{$order->bike_id}}">
                                    <div class="form-group row">                                
                                    {{ csrf_field() }}
                                      <div class="col-10">
                                        <input class="form-control" type="date" value="" name="date" id="date">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">
                                                Leverdatum kiezen
                                            </button>
                                        </div>
                                    </div>
                                </form>       
                            </td>
                        </tr>
                @endforeach
            </tbody>
          </table>
          @if($allOrdersToDeliver->isEmpty())
                <p>Er zijn nog geen nieuwe leveringen zonder leverdatum</p>
            @endif

        </div>
        <div class="container">
            <h4>Leveringen</h4>
            <table class="table table-hover">
            <thead>
                <tr>
                <th></th>
                <th>Leverdatum</th>
                <th>Merk en model</th>
                <th>Naam Koper</th>
                <th>Bestemming</th>
                <th></th>                
              </tr>
            </thead>
            <tbody>
                @foreach($allOrdersToDeliverWithDeliveryOrder as $key => $order)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <p>{{$order->date}}</p>
                            </td>
                            <td>
                                <p>{{$order->brand}} {{$order->model}}</p>
                            </td>
                            <td>
                                <p>{{$order->buyerFirstName}} {{$order->buyerName}}</p>
                            </td>
                            <td>
                                <p>{{$order->buyerAdres}}</p>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="/setOrderAsDeliverd/{{$order->bike_id}}">Geleverd</a>       
                            </td>
                        </tr>
                @endforeach
            </tbody>
          </table>
          @if($allOrdersToDeliverWithDeliveryOrder->isEmpty())
                <p>Er zijn nog geen nieuwe leveringen</p>
            @endif

        </div>
        
            
    </div>
@endsection