<head>
    <title>個人資料</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.0/dist/sweetalert2.all.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/Smartmirror.css">
    <link rel="stylesheet" type="text/css" href="/css/animate.css">
    <script src="/js/jquery.twzipcode.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
</head>
    @extends('ImageUpload')
@section('content')
    @include('header')
@endsection
@section('content2')
    <?php
    $email = Auth::user()->email;
    $file = DB::table('images')->where('user', $email)->pluck('image');
    $file = str_replace('["','',$file);
    $file = str_replace('"]','',$file);
    ?>
    <?
    $county = "";
    $district = "";
    $location = "";
    $headline = "";
    $international = "";
    $business = "";
    $science = "";
    $entertainment = "";
    $sport ="";
    $health ="";
    $local ="";
    if (DB::select("SELECT * FROM `personalization` WHERE user ='" . Auth::user()->email . "'", [true])) {
    $file1 = DB::select("select * from personalization where user ='" . Auth::user()->email."'");
    foreach ($file1 as $k1 ){
        $county = $k1->county;
        $district = $k1->district;
        $location = $k1->location;
        $headline = $k1->headline;
        $international = $k1->international;
        $business = $k1->business;
        $science = $k1->science;
        $entertainment = $k1->entertainment;
        $sport = $k1->sport;
        $health = $k1->health;
        $local = $k1->local;
    }
    }
    ?>
@endsection
