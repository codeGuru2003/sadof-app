@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
         <div class="card">
             <div class="card-header">Edit Position</div>
             <div class="card-body">
                 <form action="{{ route('positions.update', ['id' => $position->id]) }}" method="POST">
                     @csrf
                     <div class="form-group">
                         <label>Name</label>
                         <input class="form-control" name="name" value="{{ $position->name }}">
                     </div><br />
                     <div class="form-group">
                         <button class="btn btn-success text-light">Update</button> |
                         <a href="{{ url('/positions') }}" class="btn btn-primary">Back</a>
                     </div>
                 </form>
             </div>
         </div>
    </div>
</div>
@endsection
