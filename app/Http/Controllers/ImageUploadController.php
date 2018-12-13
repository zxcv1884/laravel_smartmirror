<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Image;
use App\personalization;
use DB;
use Illuminate\Support\Facades\Storage;
class ImageUploadController extends Controller
{
    /**
     * Show the application ImageUpload.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('/home');
    }

    /**
     * Show the application ImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function ImageUploadPost(Request $request)
    {
        if ($request->has('image')) {

        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'image' => 'required',
        ]);

        if ($validator->passes()) {
            $user = $request->user;
            $image = $request->image;

            list($type, $image) = explode(';', $image);
            list(, $image) = explode(',', $image);
            $image = base64_decode($image);
            $image_name = time() . '.png';
            $path = public_path('images/' . $image_name);
            file_put_contents($path, $image);
            $input = array('user' => $user, 'image' => $image_name);

            if (DB::select("SELECT * FROM `images` WHERE user ='" . $user . "'", [true])) {
                $file = DB::table('images')->where('user', $user)->pluck('image');
                $file = str_replace('["', '', $file);
                $file = str_replace('"]', '', $file);
                $file = str_replace('[', '', $file);
                $file = str_replace(']', '', $file);
                $file = str_replace(' ', '', $file);

                if (file_exists('images/' . $file)) {
                    unlink('images/' . $file);
                }
                DB::table('images')
                    ->where('user', '=', $user)
                    ->update(['updated_at' => now(), 'image' => $image_name]);
            } else {
                Image::create($input);
            }
            return redirect('home')->with('message', '照片更新成功');
        }
        return redirect('home')->with('error', $validator->errors()->all());
        }else {
            $validator = Validator::make($request->all(), [
                'county' => 'required',
                '$district' => '$district'
            ]);
            if ($validator->passes()) {
                $user = $request->email;
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
                return redirect('home')->with('message', '個人化設定成功');
            }
            return redirect('home')->with('error', $validator->errors()->all());
        }
    }
    public function personalizationPost(Request $request)
    {

    }
}
