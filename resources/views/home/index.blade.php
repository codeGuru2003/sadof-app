@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="mr-5">Total Payments ({{ date("Y") }}) - ${{ $totalpayment }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('payments.index') }}">
                <span class="float-left">View Details</span>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="mr-5">Total Member - {{ $totalmember }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('members.index') }}">
                <span class="float-left">View Details</span>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="mr-5">Total Male Member - {{ $totalmales }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('members.index') }}">
                <span class="float-left">View Details</span>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
                <div class="mr-5">Total Female Member - {{ $totalfemales }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('members.index') }}">
                <span class="float-left">View Details</span>
            </a>
            </div>
        </div>
    </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Total Membership Fee Payment Per Year
        </div>
        <div class="card-body">
          <div>
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Total Monthly Due Payment Per Year
          </div>
          <div class="card-body">
            <div>
              <canvas id="ptxChart"></canvas>
            </div>
          </div>
        </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('myChart');
    const ptx = document.getElementById('ptxChart');
    let totalMembershipFee = {{ $total_membership_payment }};
    let totalMonthlyDue = {{ $total_monthly_due }};
    let currentYear = {{ date("Y") }};

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [currentYear],
        datasets: [{
          label: 'Sum of Membership Payment',
          data: [totalMembershipFee],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    new Chart(ptx, {
      type: 'bar',
      data: {
        labels: [currentYear],
        datasets: [{
          label: 'Sum of Monthly Payment',
          data: [totalMonthlyDue],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endsection
