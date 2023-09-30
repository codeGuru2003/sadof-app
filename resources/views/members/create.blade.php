@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Create Member</h3>
        <form action="{{ url('members/create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" required>
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
                                            <input type="text" name="firstname" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Middle Name</label>
                                            <input type="text" name="middlename" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">Last Name</label>
                                            <input type="text" name="lastname" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dateorbirth">Date of Birth</label>
                                            <input type="date" name="dateofbirth" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select name="gender_id" id="gender_id" class="form-control">
                                                @foreach($genders as $gendersid => $gendername)
                                                    <option value="{{ $gendersid }}">{{ $gendername }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact">Contact 1</label>
                                            <input type="text" name="contact_1" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Contact 2</label>
                                            <input type="text" name="contact_2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Email</label>
                                            <input type="text" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Is Leader</label>
                                            <input type="checkbox" name="is_leader" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Position</label>
                                            <select name="position_id" id="position_id" class="form-control">
                                                @foreach($positions as $positionid => $positionname)
                                                    <option value="{{ $positionid }}">{{ $positionname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Birth Month</label>
                                            <select name="birth_month_id" id="birth_month_id" class="form-control">
                                                @foreach($birthmonths as $birthmonthid => $birthmonthname)
                                                    <option value="{{ $birthmonthid }}">{{ $birthmonthname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button class="btn btn-success w-100">Create</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <a href="{{ url('/members') }}" class="btn btn-primary w-100">Back to List</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
