@extends('adminlte::page')

@section('title', 'Reports')

@section('content_header')
    <h1>Reports</h1>
@stop

@section('content')

@if(session()->has('message'))
    <div class="alert alert-info">
        {{ session()->get('message') }}
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Generate Reports</small></h3>
            </div>
            <form method="POST" action="{{ route('admin.reports.generate') }}">
                @csrf

                @if($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="count">Reports</label>
                            <select name="report" id="report" class="form-control form-select">
                                @foreach ($reports as $report => $name)
                                    <option value="{{ $report }}"> {{ $name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('count'))
                                <small class="help-block text-danger">
                                    <strong>{{ $errors->first('count') }}</strong>
                                </small>
                            @endif
                        </div>

                        <div class="bookings-filter row">
                            <div class="form-group col-md-6">
                                <label for="count">Status</label>
                                <select name="status" id="status" class="form-control form-select">
                                    <option value="ALL">All</option>
                                    @foreach ($grouped_statuses as $group => $statuses)
                                        <optgroup label="{{ $group }}">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}">{{ Str::of($status)->title()->replace('_', ' ') }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date_range">Date Range</label>

                                <select name="date_range" id="date_range" class="form-control form-select">
                                    <option value="today">Today</option>
                                    <option value="week">This Week</option>
                                    <option value="range">This Month</option>
                                    <option value="year">This Year</option>
                                    <option value="custom">Custom Range</option>
                                </select>

                            </div>

                            <div class="form-group col-md-6" id="custom_date_range_from_div">
                                <label for="date_range">From</label>
                                <input type="date" class="form-control" name="custom_date_range_from" id="custom_date_range_from" max="{{ date('Y-m-d') }}">
                            </div>

                            <div class="form-group col-md-6" id="custom_date_range_to_div">
                                <label for="date_range">To</label>
                                <input type="date" class="form-control" name="custom_date_range_to" id="custom_date_range_to" max="{{ date('Y-m-d') }}" disabled>
                            </div>
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">
                            {{ __('Generate') }}
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('css')
    <style>
        #custom_date_range_from_div {
            display:none;
        }
        #custom_date_range_to_div {
            display:none;
        }
    </style>
@stop

@section('js')
    <script>
        let custom_from = document.getElementById('custom_date_range_from');
        let custom_to = document.getElementById('custom_date_range_to');

        document.getElementById('report').addEventListener('change', function() {
            if(this.value == 'bookings') {
                document.getElementsByClassName('bookings-filter')[0].style.display = 'flex';
            } else {
                document.getElementsByClassName('bookings-filter')[0].style.display = 'none';
            }
        });

        document.getElementById('date_range').addEventListener('change', function() {
            if(this.value == 'custom') {
                custom_to.value = ''
                custom_to.value = ''
                document.getElementById('custom_date_range_from_div').style.display = 'block';
                document.getElementById('custom_date_range_to_div').style.display = 'block';
            } else {
                document.getElementById('custom_date_range_from_div').style.display = 'none';
                document.getElementById('custom_date_range_to_div').style.display = 'none';
            }
        });

        custom_from.addEventListener('change', function() {
            custom_to.setAttribute('min', this.value)
            custom_to.disabled = false
            custom_to.value = ''
        });

        custom_from.addEventListener('change', function() {
            custom_to.setAttribute('min', this.value)
            custom_to.disabled = false
            custom_to.value = ''
            custom_to.focus()
        });
    </script>
@stop