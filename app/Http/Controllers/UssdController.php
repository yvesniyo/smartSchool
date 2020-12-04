<?php

namespace App\Http\Controllers;

use App\Http\Ussd\States\Welcome;
use Illuminate\Http\Request;
use Sparors\Ussd\Facades\Ussd;

class UssdController extends Controller
{
    public function index(Request $request)
    {
        $ussd = Ussd::machine()
            ->setFromRequest([
                'network',
                'phone_number' => 'phone',
                'sessionId' => 'sessionId',
                'input' => 'text'
            ])
            ->setInitialState(Welcome::class)
            ->setResponse(function (string $message, string $action) {
                $rslt = "";
                if ($action == "input") {
                    $rslt .= "CON ";
                } else {
                    $rslt .= "END ";
                }

                $rslt .= $message;

                return $rslt;
            });

        return $ussd->run();
    }
}
