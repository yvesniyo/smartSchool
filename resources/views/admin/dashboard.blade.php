@extends('brackets/admin-ui::admin.layout.default')



@section('body')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card-counter primary">
                <i class="fa fa-code-fork"></i>
                <span class="count-numbers">{{ $todayAttendancies }}</span>
                <span class="count-name">Today attendants</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter danger">
                <i class="fa fa-ticket"></i>
                <span class="count-numbers">{{ $studentsWithoutCards }}</span>
                <span class="count-name">Students Without Cards</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter success">
                <i class="fa fa-users"></i>
                <span class="count-numbers">{{ $totalStudents }}</span>
                <span class="count-name">Total Students</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-counter bg-dark">
                <i class="fa fa-applience"></i>
                <span class="count-numbers">{{ $totalDevices }}</span>
                <span class="count-name">Total Devices</span>
            </div>
        </div>
    </div>

    <div class="row bg-white m-2 mt-4 border-darken-3  p-2  rounded-sm shadow-sm ">
        <div class="col-md-6">
            <label class=" text-primary">{{ $chart2->options['chart_title'] }}</label>
            {!! $chart2->renderHtml() !!}
        </div>
        <div class="col-md-6">
            <label class=" text-primary">{{ $chart1->options['chart_title'] }}</label>
            {!! $chart1->renderHtml() !!}
        </div>

    </div>

</div>

@endsection


@section('styles')
<style>
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.primary {
        background-color: #007bff;
        color: #FFF;
    }

    .card-counter.danger {
        background-color: #ef5350;
        color: #FFF;
    }

    .card-counter.success {
        background-color: #66bb6a;
        color: #FFF;
    }

    .card-counter.info {
        background-color: #26c6da;
        color: #FFF;
    }

    .card-counter i {
        font-size: 5em;
        opacity: 0.2;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 32px;
        display: block;
    }

    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }

</style>
@endsection

@section('bottom-scripts')

{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
{!! $chart2->renderJs() !!}

@endsection
