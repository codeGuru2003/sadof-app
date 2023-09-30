@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3>Edit Payment</h3>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('payments.update', ['id' => $payment->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="member_id">Member</label>
                            <select name="member_id" id="member_id" class="form-control">
                                @foreach ($members as $memberId => $memberName)
                                    <option value="{{ $memberId }}" {{ $payment->member_id == $memberId ? 'selected' : '' }}>
                                        {{ $memberName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="payment_type_id">Payment Type</label>
                            <select name="payment_type_id" id="payment_type_id" class="form-control">
                                @foreach ($paymenttypes as $typeId => $typeName)
                                    <option value="{{ $typeId }}" {{ $payment->payment_type_id == $typeId ? 'selected' : '' }}>
                                        {{ $typeName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" id="remarks" class="form-control" value="{{ $payment->remarks }}">
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-control" value="{{ $payment->amount }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Update Payment</button> |
                        <a href="{{ route('payments.index') }}" class="btn btn-primary">Back to List</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
