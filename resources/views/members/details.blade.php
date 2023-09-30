@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Member Details</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="container text-center">
                                <img src="{{ asset( 'storage/' . $member->image ) }}" alt="Member Image" class="img-rounded" width="80%"><br><br>
                                <a href="{{ url('/members') }}" class="btn btn-primary w-100">Back to List</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" value="{{ $member->firstname }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Middle Name</label>
                                            <input type="text" value="{{ $member->middlename }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Last Name</label>
                                            <input type="text" value="{{ $member->lastname }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dateorbirth">Date of Birth</label>
                                            <input type="date" value="{{ $member->dateofbirth }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <input type="text" value="{{ $member->gname }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" value="{{ $member->address }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact">Contact 1</label>
                                            <input type="text" value="{{ $member->contact_1 }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Contact 2</label>
                                            <input type="text" value="{{ $member->contact_2 }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Email</label>
                                            <input type="text" value="{{ $member->email }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Is Leader</label>
                                            @if ($member->is_leader == true)
                                                <input type="checkbox" value="{{ $member->is_leader }}" checked disabled>
                                            @else
                                                <input type="checkbox" value="{{ $member->is_leader }}" disabled>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Position</label>
                                            <input type="text" value="{{ $member->pname }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Birth Month</label>
                                            <input type="text" value="{{ $member->bname }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
