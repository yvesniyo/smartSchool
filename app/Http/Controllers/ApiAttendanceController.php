<?php

namespace App\Http\Controllers;

use App\Helpers\ResHelper;
use App\Jobs\SendParentSmsStudentAttandanceJob;
use App\Models\Attendancy;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiAttendanceController extends Controller
{

    public function record(Request $request, ResHelper $res)
    {

        $validator = Validator::make($request->all(), [
            "uuid" => "required",
            "nfc" => "required",
        ]);

        if ($validator->fails()) {
            return $res->errorValidator($validator);
        }
        $nfc = strtolower($request->nfc);
        $nfc = str_replace(" ", "", $nfc);

        $student = Student::where("nfc", $nfc)->first();
        if ($student == null) {
            return $res->error("Unknown NFC");
        }

        $attendendedInTime = Attendancy::where("student_id", $student->id)
            ->where("created_at", ">=", now()->subHours(3))
            ->exists();
        if ($attendendedInTime) {
            return $res->error("Attended earlier, wait for 3 hours later");
        }
        $attendance = Attendancy::create(['student_id' => $student->id]);
        if ($attendance) {
            return $res->message("Attendance successs");
        }

        return $res->error("There was an error in recording attendance");
    }
}
