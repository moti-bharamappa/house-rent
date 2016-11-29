@extends('layouts.app')

@section('content')
<div class="container">
    <div class="m-b-md">
        <form action="/search" method="get" name="search">
            <div class="form-group">
                <input type="text" name="query" placeholder="Search" class="form-control" />    
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Search Again</button>
            </div>
        </form>
    </div>
    @if (!empty($ads))
        @foreach($ads as $ad) 
        <div class="panel panel-default">
          <div class="panel-body">
            <p>{{ $ad->location }}</p>
            <p>{{ $ad->address }}</p>
            <p>{{ $ad->rent }}</p>
            <p>{{ $ad->{'no-of-beds'} }}</p>
          </div>
        </div>
        @endforeach
    @endif
</div>
@endsection
