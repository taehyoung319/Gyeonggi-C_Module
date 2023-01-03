<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="{{asset('public/vendor/bootstrap-5.0.2-dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/script/jquery-3.6.0.js')}}"></script>
    @yield('script')

    <link rel="stylesheet" href="{{asset("public/vendor/bootstrap-5.0.2-dist/css/bootstrap.css")}}">
    <link rel="stylesheet" href="{{asset("public/vendor/fontawesome/css/fontawesome.css")}}">
    <link rel="stylesheet" href="{{asset("public/vendor/fontawesome/css/all.css")}}">
    <link rel="stylesheet" href="{{asset("public/css/style.css")}}">


    @if($errors->any())
        <script>
            alert('{{$errors->first()}}');
        </script>
    @endif

    @if(session()->has('msg'))
        <script>
            alert('{{session()->get('msg')}}');
        </script>
    @endif

    <title>Document</title>
</head>
<body>



<!--헤더-->
<header class="container d-flex justify-content-between align-items-center position-fixed">
    <img src="{{asset("public/img/logo.png")}}" alt="img" title="img" class="h-100">
    <div class="d-flex justify-content-between align-items-center">
        <ul class="position-relative d-flex justify-content-center gg one">
            <li><a href="index.blade.php"><span class="hover">홈</span></a></li>
            <li class="position-relative depth1">
                <a href="{{route('gardenPage')}}"><span class="hover">정원안내</span></a>
                <ul class="position-absolute depth-1">
                    <li><a href="{{route("gardenPage")}}"><span class="hover">정원안내</span></a></li>
                    <li><a href="search.html"><span class="hover">정원검색</span></a></li>
                    <li><a href="list.html"><span class="hover">전체정원목록</span></a></li>
                </ul>
            </li>
            <li class="position-relative depth2">
                <a href="#"><span class="hover">정원예약</span></a>
                <ul class="position-absolute depth-2">
                    <li><a href="#"><span class="hover">예약확인</span></a></li>
                    <li><a href="{{route('reserveListPage')}}"><span class="hover">예약내약</span></a></li>
                </ul>
            </li>
            <li><a href="{{route('boardPage')}}"><span class="hover">정원 소식지</span></a></li>
        </ul>
        <ul class="d-flex justify-content-between align-items-center oo one user">
            @if(Auth()->user())
                <li><a href="{{route('logout')}}"><span class="hover">로그아웃</span></a></li>
            @else
                <li><a href="{{route('loginPage')}}"><span class="hover">로그인</span></a></li>
            @endif

            <li><a href="{{route('joinPage')}}"><span class="hover">회원가입</span></a></li>
        </ul>
    </div>
</header>
<main>
    <!--        비주얼-->
    <section id="visual" class="vw-100 vh-100">
        <div class="contents vw-100 vh-100 d-flex justify-content-between align-items-center container position-relative">
            <div class="textBox">
                <span class="point"></span>
                <h3 class="pp bbb mb-5">#Visual - 01</h3>
                <h1 class="_title mb-5">PRAVATE GARDENS <br> IN GYEONGNAM</h1>
                <h3 class="pp bbb mb-3">아름다운 풍경에 젖어보세요.</h3>
                <p class="pp mb-5">Lorem ipsum dolor sit amet, consectetur <br>
                    adipisicing elit. Animi aperiam commodi <br>
                    consectetur dolores earum eveniet magni <br>
                </p>
                <div class="d-flex justify-content-start count">
                    <span class="d-block one oo"></span>
                    <span class="d-block one gg"></span>
                    <span class="d-block one gg"></span>
                </div>
            </div>
            <div class="imgBox imgBox1 position-absolute">
                <img src="{{asset("public/img/visual1_1.png")}}" alt="img" title="img" class="position-absolute">
                <img src="{{asset("public/img/visual1_2.png")}}" alt="img" title="img" class="position-absolute">
                <img src="{{asset("public/img/visual1_3.png")}}" alt="img" title="img" class="position-absolute">
                <img src="{{asset("public/img/visual1_4.png")}}" alt="img" title="img" class="position-absolute">
            </div>
        </div>
    </section>
    @yield('contents')
</main>
<!--푸터-->
<footer class="gg">
    <div class="container d-flex flex-column justify-content-center align-items-center h-100">
        <div class="w-100 d-flex justify-content-between align-items-center ">
            <img src="{{asset("public/img/f_logo.png")}}" alt="img" title="img">
            <div class="icons">
                <i class="fa fa-globe-americas"></i>
                <i class="fa fa-globe-africa mr-3 ml-3"></i>
                <i class="fa fa-globe-asia"></i>
            </div>
        </div>
        <ul class="one w-100 d-flex justify-content-start align-items-center">
            <li>사이트오류신고</li>
            <li>오시는 길</li>
            <li>저작권침해신고</li>
            <li>문의하기</li>
        </ul>
        <div class="w-100 d-flex justify-content-between align-items-center">
            <p>Help
                Call: (055) 126-0021
                Email: help@gyeongnam.garden
                Address: 경남 함양군 서성면 가르내길 202-1 (우 50002)</p>
            <p>Copyright
                Copyright (c) 2021 ~ 2022 Gyeongnam Garden. All rights reserved.</p>
        </div>
    </div>
</footer>
</body>
</html>
