@if (Route::has('login'))
    <div class="links pageHeader">
        @auth
            <div class="s_m">
                <a href="{{ url('/') }}" >Smart Mirror</a>
            </div>
            <a href="{{route('logout')}}">登出</a>
            <a href="{{url('/demo')}}">產品簡介</a>
            <a href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
        @else
            <div class="s_m">
                <a href="{{ url('/') }}" >Smart Mirror</a>
            </div>
            <a href="{{ route('register') }}">會員註冊</a>
            <a href="{{ route('login') }}">會員登入</a>
            <a href="{{url('/demo')}}">產品簡介</a>
        @endauth

    </div>
@endif