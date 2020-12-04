<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class GetRecipientNumber extends State
{
    protected $action = self::PROMPT;
    protected function beforeRendering(): void
    {

        $this->menu->text("Phone Number is")
            ->lineBreak(2)
            ->line($this->record->phone);
    }

    protected function afterRendering(string $argument): void
    {
        //
    }
}
