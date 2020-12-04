<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class GetStudentsInSchool extends State
{
    protected function beforeRendering(): void
    {
        $school = $this->record->school;
        if ($school == 1) {
            $school = "La promise";
        } else if ($school == 2) {
            $school = "Mweya";
        }

        $this->menu->text("Students on $school")
            ->lineBreak(2)
            ->listing([
                "Niyobuhungiro Yves",
                "Shema Hertier"
            ]);
    }

    protected function afterRendering(string $argument): void
    {
        $this->record->student = $argument;
        $this->decision->equal(1, GetStudentAttendance::class)
            ->any(Error::class);
    }
}
