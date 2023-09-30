@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container">
                @php
                    $count = 1;
                @endphp
                <h3>List of Birthmonths</h3>
                <a href="{{ route('birthmonths.create') }}" class="btn btn-primary">Create</a>
                <div class="card mt-2 mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="birthTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($birthmonths as $birthmonth)
                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $birthmonth->name }}</td>
                                            <td>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <a href="{{ route('birthmonths.edit', ['id' => $birthmonth->id]) }}" class="btn btn-warning btn-sm text-light">Edit</a>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6">
                                                                    <form action="{{ route('birthmonths.delete', ['id' => $birthmonth->id ]) }}" method="POST">
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
    <script text="text/javascript">
        $(document).ready( function () {
            $('#birthTable').DataTable();
        });
    </script>
@endsection
