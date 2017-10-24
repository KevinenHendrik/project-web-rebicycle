@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="sellBike">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="/editBike/{{$bike->bike_id}}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('brand') ? ' has-error' : '' }}">
                            <label for="brand" class="col-md-4 control-label">Merknaam*</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control" name="brand" value="{{ $bike->brand }}" required autofocus>

                                @if ($errors->has('brand'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                            <label for="model" class="col-md-4 control-label">Model*</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control" name="model" value="{{ $bike->model }}" required autofocus>

                                @if ($errors->has('model'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Categorie*</label>

                            <div class="col-md-6">
                                <select id="category"  class="form-control" name="category" value="{{ old('category') }}" required>
                                  <option value="Herenfiets">Herenfiets</option>
                                  <option value="Damesfietsen">Damesfietsen</option>
                                  <option value="racefietsen">racefietsen</option>
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sellingPrice') ? ' has-error' : '' }}">
                            <label for="model" class="col-md-4 control-label">Verkoopprijs*</label>

                            <div class="col-md-6">
                                <input id="sellingPrice" type="text" class="form-control" name="sellingPrice" value="{{ $bike->sellingPrice }}" required autofocus>

                                @if ($errors->has('sellingPrice'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sellingPrice') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Beschrijving*</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control" name="description" required>{{ $bike->description }}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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

                        <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                            <label for="images" class="col-md-4 control-label">Voeg één of meerdere afbeeldingen toe*</label>
                            <div class="col-md-6">
                                <input type="file" name="images[]" multiple="true" /><br/>
                                @if ($errors->has('images'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('images') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Zoekertje wijzigen
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
