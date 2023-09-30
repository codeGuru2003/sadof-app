@extends('layouts.app')
@section('content')
<h3>List of Payments</h3>
<a href="{{ route('payments.create') }}" class="btn btn-primary text-light">Create</a>
<br><br>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                @php
                    $count = 1;
                @endphp
                <table class="table table-striped" id="payments">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Member</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $count }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->payname }}</td>
                                <td>{{ $payment->mfirstname .' '. $payment->mmiddlename .' '. $payment->mlastname }}</td>
                                <td>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <a href="{{ route('payments.edit', ['id' => $payment->id]) }}" class="btn btn-warning btn-sm text-light">Edit</a>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <form action="{{ route('payments.delete', ['id' => $payment->id ]) }}" method="POST">
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
    <script text="text/javascript">
        $(document).ready( function () {
            $('#payments').DataTable();
        });
    </script>
@endsection
