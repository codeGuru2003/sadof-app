@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3>Create Profession</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('professions.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <button class="btn btn-success">Save Record</button> |
                            <a href="{{ route('professions.index') }}" class="btn btn-primary">Back to List</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
