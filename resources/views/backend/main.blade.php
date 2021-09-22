@extends('layouts.backend')
@section('title', '主頁面')
@section('content')
  <div class="col-9 row p-0 content">
    <div class="col mx-1 py-2 card shadow">
      <p>會員總人數</p>
      <span><i class="fas fa-users"></i></span>
      <h2 class="text-center text-success">666</h2>
    </div>
    <div class="col mx-1 py-2 card shadow">
      <p>本月訂單數</p>
      <span><i class="fas fa-clipboard"></i></span>
      <h2 class="text-center text-info">26</h2>
    </div>
    <div class="col mx-1 py-2 card shadow">
      <p>本月訂單金額</p>
      <span><i class="fas fa-dollar-sign"></i></span>
      <h2 class="text-center text-primary">38800</h2>
    </div>
    <div class="col mx-1 py-2 card shadow">
      <p>待處理訂單</p>
      <span><i class="fas fa-tasks"></i></span>
      <h2 class="text-center text-danger">2</h2>
    </div>
    <!-- Chart -->
    <div class="col-12 py-3 px-1">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold">每月訂單金額</h6>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Earnings",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [6000, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000],
        }],

      },
      options: {
        scales: {
          y: {
            ticks: {
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return '$' + value;
              }
            }
          }
        }
      }
    });
  </script>
@endsection
