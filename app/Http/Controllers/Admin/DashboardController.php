<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendancy;
use App\Models\Device;
use App\Models\Student;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class DashboardController extends Controller
{
    public function index()
    {

        $chart_options = [
            'chart_title' => 'Students by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Student',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            "chart_height" => "50px",
        ];
        $chart1 = new LaravelChart($chart_options);


        $chart_options = [
            'chart_title' => 'Attendancies by day',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Attendancy',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_period' => 'month', // show attendancies only registered this month
            "chart_height" => "50px",

        ];
        $chart2 = new LaravelChart($chart_options);

        $todayAttendancies = Attendancy::whereDate("created_at", today())->count();
        $studentsWithoutCards = Student::where("nfc", null)->count();
        $totalStudents = Student::count();
        $totalDevices = Device::count();

        return view('admin.dashboard', compact(
            'chart1',
            'chart2',
            'totalDevices',
            'totalStudents',
            'studentsWithoutCards',
            'todayAttendancies'
        ));
    }
}
