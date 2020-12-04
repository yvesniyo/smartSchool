<?php

namespace App\Http\Ussd\States;

use Sparors\Ussd\State;

class Error extends State
{
    protected function beforeRendering(): void
    {
        $this->menu->text("Incorrect Choice")
            ->lineBreak(2)
            ->listing([
                "Home Menu",
                "Quit"
            ]);
    }

    protected function afterRendering(string $argument): void
    {
        $this->decision->equal(1, Welcome::class)
            ->any(Error::class);
    }
}
