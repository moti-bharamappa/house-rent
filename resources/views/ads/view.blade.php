@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="col-md-1-offset-1 pull-right">
                        {{-- <a href="/" class="btn btn-primary">Back</a> --}}
                    </span>
                </div>
                <div class="panel-body">
                  <div class="row">
                      <div class="col-md-12">
                          <table class="table table-striped">
                            <thead>
                              <tr> 
                                  <th>#</th>
                                  <th>Location</th>
                                  <th>Adress</th>
                                  <th>Rent</th>
                                  <th>No Of Beds</th>
                                  <th>Action</th>
                                </tr>
                              <tbody>
                              @foreach($ad as $ad)
                                <tr>
                                  <td>
                                    {{$ad->id}}
                                  </td>
                                  <td>
                                    {{$ad->location}}
                                  </td>
                                  <td>
                                    {{$ad->address}}
                                  </td>
                                  <td>
                                    {{$ad->rent}}
                                  </td>
                                  <td>
                                    {{ $ad->{'no-of-beds'} }}
                                  </td>
                                </tr>
                              @endforeach
                              </tbody>
                            </thead>
                          </table>
                          <div class="images">
                            @if(!empty($ad->photos))
                                @foreach($ad->photos as $photo)
                                    <img  width="200" height="200" src={{ '/' . $photo->path }} />
                                @endforeach
                            @endif
                          </div>
                      </div>
                  </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
