<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/Smartmirror.css">
    <title>Demo</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <style>
        .name {
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            width: 220px;
            height: 220px;
            top: 100px;
            left: 50px;
            position: absolute;
            z-index: 0;
            border: 2px solid black;

        }

        .content {
            background-color: #AAAAAA;
            width: 0px;
            height: 220px;
            top: 100px;
            left: 275px;
            position: absolute;
            text-align: center;
            line-height: 100px;
            -webkit-transition: width 0.5s linear;
            transition: width 0.5s linear;
            z-index: -1;
            overflow: hidden;
            white-space: nowrap;

        }

        .name:hover + .content {
            width: 1000px;
        }
        header {
            text-align: center;
            font-size: 50px;
            color: red;
        }

    </style>
</head>
<body>
<div class=" position-ref full-height">
    @include('header')
</div>
<div class="name" style="background-image:url('images/1.png');"></div>
<div class="content">這個功能讓你可以看目前未來三日的天氣預報。<br><font color="red">每3個小時更新一次，限定台澎金馬外島地區！</font></div>

<div class="name" style="background-image:url('images/2.png');top:325px;"></div>
<div class="content" style="top:325px;">這個功能讓你隨時掌握時間。<br><font color="red">根據樹莓派預設時區！</font></div>

<div class="name" style="background-image:url('images/3.png');top:550px;"></div>
<div class="content" style="top:550px">這個功能讓你看到最新的即時新聞，掌握時事。<br><font color="red">使用者可以設定自己喜歡的新聞類別。</font>
</div>

<div class="name" style="background-image:url('images/4.png');top:775px;"></div>
<div class="content" style="top:775px">這個功能可以透過Google帳號，來檢視你所設定的待辦事項。<br><font color="red">必須登入Google帳號並驗證。</font></div>

</body>
</html>