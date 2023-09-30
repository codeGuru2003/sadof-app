@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container">
                @php
                    $count = 1;
                @endphp
                <h3>List of Payment Types</h3>
                <a href="{{ route('paymenttypes.create') }}" class="btn btn-primary">Create</a><br /><br>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="genderTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paymenttypes as $paymenttype)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $paymenttype->name }}</td>
                                            <td>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <a href="{{ route('paymenttypes.edit', ['id' => $paymenttype->id]) }}" class="btn btn-warning btn-sm text-light">Edit</a>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <form action="{{ route('paymenttypes.delete', ['id' => $paymenttype->id ]) }}" method="POST">
                                                                        @csrf
                                                                        <button class="btn btn-danger btn-sm text-light">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-sm-6"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @php
                                            $count++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
