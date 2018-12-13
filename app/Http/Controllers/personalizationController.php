<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class personalizationController extends Controller
{
    public function home()
    {
        return view('/home');
    }

    public function personalizationPost(Request $request)
    {
        $user = $request->user;
        $county = $request->county;
        $district = $request->district;
        $location = $request->location;
        $headline = $request->headline;
        $international = $request->international;
        $business = $request->business;
        $science = $request->science;
        $entertainment = $request->entertainment;
        $sport = $request->sport;
        $health = $request->health;
        $local = $request->local;

        $input = array('user' => $user, 'county' => $county, 'district' => $district, 'location' => $location, 'headline' => $headline, 'international' => $international,
            'business' => $business, 'science' => $science, 'entertainment' => $entertainment, 'sport' => $sport, 'health' => $health, 'local' => $local);

        if (DB::select("SELECT * FROM `personalization` WHERE user ='" . $user . "'", [true])) {
            DB::table('personalization')
                ->where('user', '=', $user)
                ->update(['updated_at' => now(), 'county' => $county, 'district' => $district, 'location' => $location, 'headline' => $headline, 'international' => $international,
                    'business' => $business, 'science' => $science, 'entertainment' => $entertainment, 'sport' => $sport, 'health' => $health, 'local' => $local]);
        } else {
            personalization::create($input);
        }
        return redirect('home')->with('message', 'personalization_Success');
    }
}
