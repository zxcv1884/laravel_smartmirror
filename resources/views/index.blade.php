<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/Smartmirror.css">
    <title>Smart Mirror</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        .content {

        }
        .head-title2 {
            font-size: 18px;
            text-align: center;
            font-weight: bold;
        }
        .head-title1 {
            font-size: 84px;
        }
        .m-b-md {
            text-align: left;
            margin-bottom: 30px;
        }
        .head-img{
            position: relative;
            width: 80%;
            height: 100vh;
            padding: auto;
            margin: auto;
            background-image: url({{url('/img/1231.jpg')}});
            background-repeat: no-repeat;
            background-position: top;
            background-size: 100%;
            max-height: 689px;
            min-width: 1226px;
            overflow: hidden;
            box-sizing: border-box;
        }
        .container{
            margin-top: 9%;
            margin-left: 55%;
            text-align: left;
            height: 20.3125rem;
        }
        .maintop{

        }
    </style>
</head>
<body>
{{--上方工具列--}}
<div class=" position-ref full-height">
        @include('header')
    {{--第一頁--}}
        <div class="main maintop">
        <div class="head-img">
            <div class="container">
                <div class="content">
                    <div class="head-title1 m-b-md">
                        Smart mirror
                    </div>
                    <div class='head-title2 m-b-md'>
                        <p>是否為一早忙碌生活感到煩嗎？</p>
                        <p>讓你的生活更便利。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--第二頁--}}
    <div class="container-2">

    </div>
</div>
</body>
</html>