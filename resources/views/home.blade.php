@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                    <span class="col-md-1-offset-1 pull-right">
                        <a href="/ad/post" class="btn btn-primary">POST AD</a>
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
                              @foreach($ads as $ad)
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
                                  <td>
                                    <a href={{url('ad/update/'.$ad->id)}}>Edit</a>
                                  </td>
                                  <td>
                                    <a href={{url('ad/delete/'.$ad->id)}}>Delete</a>
                                  </td>
                                </tr>
                              @endforeach
                              </tbody>
                            </thead>
                          </table>
                      </div>
                    
                  </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
