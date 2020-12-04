<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class GetStudentAttendance extends State
{

    protected $action = self::PROMPT;

    protected function beforeRendering(): void
    {
        $student = $this->record->student;

        if ($student == 1) {
            $student = "Niyobuhungiro Yves";
        } else if ($student == 2) {
            $student = "Shema Hertier";
        }

        $this->menu->text($student . " Today")
            ->lineBreak(2)
            ->line("8:10am arrived at school");
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}
