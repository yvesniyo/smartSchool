<?php

namespace App\Jobs;

use App\Helpers\SmsApi;
use App\Models\Attendancy;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendParentSmsStudentAttandanceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Student $student;
    private SmsApi $smsApi;
    private Attendancy $attendancy;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Student $student, Attendancy $attendancy)
    {
        $this->student = $student;
        $this->smsApi = new SmsApi();
        $this->attendancy = $attendancy;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $parentPhone = $this->student->parentPhone;
        $time = Carbon::parse($this->attendancy->created_at)->format("H:i:s");
        $date = Carbon::parse($this->attendancy->created_at)->format("l, m/d");
        $this->smsApi->addRecipient($parentPhone);
        $this->smsApi->message(
            $this->student->last_name
                . " ageze ku ishuri ayamasaha $time taliki $date"
        );
        $this->attendancy->notified = true;
        $this->attendancy->save();
        dispatch(new SendSmsJob($this->smsApi));
    }
}
