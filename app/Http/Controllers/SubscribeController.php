<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        if ($name != null && $email != null) {
            Subscription::create([
                "name" => $name,
                "email" => $email
            ]);
        }
        return redirect()->back();
    }
}
