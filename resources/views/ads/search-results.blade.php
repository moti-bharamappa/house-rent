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
                         <a href={{url('ad/view/'.$ad->id)}}>View</a>
                       </td>
                       <td>
                       </td>
                     </tr>
                   @endforeach
                   </tbody>
                 </thead>
               </table>
               <div class="pagination">
                   {{ $ads->links() }}
                 </div>
           </div>
       </div>
    @endif
</div>
@endsection
