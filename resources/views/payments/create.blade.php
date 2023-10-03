@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3>Create Payment</h3>
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['url' => 'payments/create', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{ Form::label('member_id', 'Select a Member') }}
                            {{ Form::select('member_id', $members, null, ['class' => 'form-control']) }}
                        </div><br>
                        <div class="form-group">
                            {{ Form::label('payment_type_id','Select a Payment Type') }}
                            {{ Form::select('payment_type_id', $paymenttypes, null, ['class' => 'form-control']) }}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('amount', 'Amount') !!}
                            {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('remarks', 'Remarks') !!}
                            {!! Form::text('remarks', null, ['class' => 'form-control']) !!}
                        </div><br>
                        <div class="form-group">
                            {!! Form::label('payment_date', 'Date') !!}
                            {!! Form::date('payment_date', null, ['class' => 'form-control']) !!}
                        </div><br>
                        {!! Form::submit('Create', ['class' => 'btn btn-success']) !!} |
                        <a href="{{ route('payments.index') }}" class="btn btn-primary">Back to List</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
