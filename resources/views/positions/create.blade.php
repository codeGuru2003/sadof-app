@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Create Position</div>
                <div class="card-body">
                    {!! Form::open(['url' => 'positions/create', 'method' => 'POST']) !!}
                        {!! Form::label('name', 'Name',) !!}
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                        <br>
                        {!! Form::submit('Create', ['class' => 'btn btn-success']) !!} |
                        <a href="{{ route('positions.index') }}" class="btn btn-primary">Back to List</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
