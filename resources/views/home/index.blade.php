@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="mr-5">Total Payments (2023) - ${{ $totalpayment }}</div>
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
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="mr-5">Total Male Member - {{ $totalmales }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
            </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
                <div class="mr-5">Total Female Member - {{ $totalfemales }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
            </a>
            </div>
        </div>
    </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Total Monthly Due Payment Per Year
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
            Total Membership Fee Payment Per Year
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

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
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
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
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
