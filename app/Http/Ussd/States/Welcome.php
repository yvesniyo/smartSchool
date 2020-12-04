<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class Welcome extends State
{
    protected function beforeRendering(): void
    {
        $name = $this->record->name;
        $this->record->phone = request()->phone;
        $this->menu->text('Welcome To StudentAttendance')
            ->lineBreak(2)
            ->line('Select School')
            ->listing([
                ' La Promise',
                ' Mweya',
            ]);
    }

    protected function afterRendering(string $argument): void
    {
        // If input is equal to 1, 2, 3, 4 or 5, render the appropriate state
        $this->record->school = $argument;
        $this->decision->equal(1, GetStudentsInSchool::class)
            ->any(Error::class);
    }
}
