<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class googleCalendarController extends Controller
{
    protected $client;
    public function googleCalendar(Request $request)
    {
        $Code = $request->Code;
        $email = $request->email;
        DB::table('users')
            ->where('email', $email)
            ->update(array('googleCode' => $Code,'googleUpdate' => 1));
        return response()->json(array('success' => true, 'Code' => $Code));
    }
}
