@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @if(isset($data))
                    <div class="panel-heading">Update</div>
                @else
                    <div class="panel-heading">Create</div>
                @endif    
                <div class="panel-body">
                    
                    @if(isset($data))
                        <div class="top-right links">
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/ad/save') }}">
                        </div>
                    @else
                        <div class="top-right links">
                            <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/ad/create') }}">
                        </div>
                    @endif
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>
                            <div class="col-md-6">
                                <input id="location" required autofocus type="text" class="form-control" name="location" 
                                value= @if(isset($data)) {{ $data->location }} @endif  >

                                @if ($errors->has('location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" required type="text" class="form-control" name="address" 
                                value= @if(isset($data)) {{ $data->address }} @endif >

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rent') ? ' has-error' : '' }}">
                            <label for="rent" class="col-md-4 control-label">Rent</label>

                            <div class="col-md-6">
                                <input id="rent" required type="text" class="form-control" name="rent"  
                                value=@if(isset($data)) {{ $data->rent }} @endif>

                                @if ($errors->has('rent'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rent') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no-of-beds" class="col-md-4 control-label">No of beds</label>

                            <div class="col-md-6">
                                <input id="no-of-beds" required type="text" class="form-control" name="no-of-beds"  
                                value=@if(isset($data)) {{ $data->{'no-of-beds'} }} @endif>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="images" class="col-md-4 control-label">Upload Images</label>

                            <div class="col-md-6">
                                <input id="images" multiple="true" required type="file" class="form-control" name="images" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                @if(isset($data))
                                    <button type="submit" class="btn btn-primary">
                                            <input type="hidden" name="id" value = {{ $data->id }} >
                                            Update
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-primary">
                                            Save
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
