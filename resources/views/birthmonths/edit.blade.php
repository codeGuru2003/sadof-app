@extends('layouts.app')
@section('content')
 <div class="row justify-content-center">
     <div class="col-md-4">
         <div class="card">
             <div class="card-header">Edit Birth Month</div>
             <div class="card-body">
                 <form action="{{ route('birthmonths.update', ['id' => $birthmonth->id]) }}" method="POST">
                     @csrf
                     <div class="form-group">
                         <label>Name</label>
                         <input class="form-control" name="name" value="{{ $birthmonth->name }}">
                     </div><br />
                     <div class="form-group">
                         <button class="btn btn-success text-light">Update</button> |
                         <a href="{{ url('/birthmonths') }}" class="btn btn-primary">Back</a>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>
@endsection
