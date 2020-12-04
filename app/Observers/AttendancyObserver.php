<?php

namespace App\Observers;

use App\Jobs\SendParentSmsStudentAttandanceJob;
use App\Models\Attendancy;

class AttendancyObserver
{
    /**
     * Handle the Attendancy "created" event.
     *
     * @param  \App\Models\Attendancy  $attendancy
     * @return void
     */
    public function created(Attendancy $attendancy)
    {
        // if (!$attendancy->notified) {
        $student = $attendancy->student;
        // dispatch(new SendParentSmsStudentAttandanceJob($student, $attendancy));
        // }
    }

    /**
     * Handle the Attendancy "updated" event.
     *
     * @param  \App\Models\Attendancy  $attendancy
     * @return void
     */
    public function updated(Attendancy $attendancy)
    {
        //
    }

    /**
     * Handle the Attendancy "deleted" event.
     *
     * @param  \App\Models\Attendancy  $attendancy
     * @return void
     */
    public function deleted(Attendancy $attendancy)
    {
        //
    }

    /**
     * Handle the Attendancy "restored" event.
     *
     * @param  \App\Models\Attendancy  $attendancy
     * @return void
     */
    public function restored(Attendancy $attendancy)
    {
        //
    }

    /**
     * Handle the Attendancy "force deleted" event.
     *
     * @param  \App\Models\Attendancy  $attendancy
     * @return void
     */
    public function forceDeleted(Attendancy $attendancy)
    {
        //
    }
}
