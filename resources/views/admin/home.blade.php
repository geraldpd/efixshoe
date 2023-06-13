@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $bookings }}</h3>
                        <p>New Bookings (Today)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <a href="{{ route('admin.bookings.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $services }}</h3>
                        <p>Services</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-cog"></i>
                    </div>
                    <a href="{{ route('admin.services.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $pmethods }}</h3>
                        <p>Payment Methods</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <a href="{{ route('admin.payment_methods.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $vouchers }}</h3>
                        <p>Vouchers</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-fw fa-credit-card"></i>
                    </div>
                    <a href="{{ route('admin.vouchers.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Bookings Last 30 Days</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="bookingsLast30Days" height="100px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Total Sales Last 30 Days</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="salesLast30Days" height="100px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
  
    var bookings_lbl =  {{ Js::from($bookings_lbl) }};
    var bookings_val =  {{ Js::from($bookings_val) }};

    const bookingsData = {
      labels: bookings_lbl,
      datasets: [{
        label: 'Bookings Last 30 Days',
        backgroundColor: 'rgb(0,123,255)',
        borderColor: 'rgb(0,123,255)',
        data: bookings_val,
      }]
    };

    var sales_lbl =  {{ Js::from($sales_lbl) }};
    var sales_val =  {{ Js::from($sales_val) }};

    const salesData = {
      labels: sales_lbl,
      datasets: [{
        label: 'Total Sales Last 30 Days',
        backgroundColor: 'rgb(0,123,255)',
        borderColor: 'rgb(0,123,255)',
        data: sales_val,
      }]
    };

    const bookingsConfig = {
      type: 'line',
      data: bookingsData,
      options: {
        legend: {
            display: false
        },
        title: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    callback: function (value) { if (Number.isInteger(value)) { return value; } },
                    stepSize: 1
                }
            }]
        }
      }
    };

    const salesConfig = {
      type: 'bar',
      data: salesData,
      options: {
        legend: {
            display: false
        },
        title: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    callback: function (value) { if (Number.isInteger(value)) { return 'PHP ' + value; } },
                    stepSize: 1000
                }
            }]
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    return 'PHP ' + tooltipItem.yLabel;
                }
            }
        }
      }
    };

    const bookingsLast30Days = new Chart(
      document.getElementById('bookingsLast30Days'),
      bookingsConfig
    );

    const salesLast30Days = new Chart(
      document.getElementById('salesLast30Days'),
      salesConfig
    );

</script>
@stop
