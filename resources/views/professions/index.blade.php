@extends('layouts.app')
@section('content')
<h3>List of Professions</h3>
<a href="{{ route('professions.create') }}" class="btn btn-primary text-light">Create</a>
<br><br>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                @php
                    $count = 1;
                @endphp
                <table class="table table-striped" id="profession">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($professions as $profession)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $profession->name }}</td>
                                <td>{{ $profession->description }}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <a href="{{ route('payments.edit', ['id' => $profession->id]) }}" class="btn btn-warning btn-sm text-light">Edit</a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <form action="{{ route('payments.delete', ['id' => $profession->id ]) }}" method="POST">
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
    <script type="text/javascript">
        $(document).ready( function () {
            $('#profession').DataTable();
        });
    </script>
@endsection
