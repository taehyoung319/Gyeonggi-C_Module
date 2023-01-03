@extends('layout')

@section('contents')
    <section id="more" class="la container">
        <div class="container">
            <div class="textBox mb-5">
                <span class="point"></span>
                <h3 class="pp bbb">정원 상세보기 페이지</h3>
                <h1 class="pp bbb title">GYEONGNAM GARDEN <br> MOREVIEW</h1>
            </div>
            <h3 class="pp bbb">정원 상세정보</h3>
            <div class="d-flex w-100 justify-content-start align-items-center dataBox bb mb-5">
                <img src="{{asset($more->image)}}" alt="img" title="img " class="p-5">
                <div class="textBoxs">
                    <h1 class="pp bbb">{{$more->name}}</h1>
                    <p>주소 | {{$more->address}}</p>
                    <p>연락처 | {{$more->phone}}</p>
                    <p>관리기관 | {{$more->management}}</p>
                    <p>정원소개 | {{$more->introduce}}</p>
                    <button class="btn btn-outline-success" onclick="location.href='{{route('reserveSignPage', $more->id)}}'">예약버튼</button>
                </div>
            </div>
            <h3 class="pp bbb">후기</h3>
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h5 class="m-0 pp bbb m-1">그레이스정원의 후기</h5>--}}
{{--                </div>--}}
{{--                <div class="card-body d-flex justify-content-between align-items-center">--}}
{{--                    <div>--}}
{{--                        <p>정원명 | 그레이스정원 </p>--}}
{{--                        <p>작성자이름 | 배태형 </p>--}}
{{--                        <p>방문일 | 2022-02-02 11:11:11 </p>--}}
{{--                        <p>별점 | 7점 </p>--}}
{{--                        <p>내용 | 정말최고입니다.</p>--}}
{{--                    </div>--}}
{{--                    <div class="d-flex justify-content-center align-items-center reviewImg">--}}
{{--                        <img src="../../../public/img/garden/그레이스정원1.jpg" alt="" title="img">--}}
{{--                        <img src="../../../public/img/garden/그레이스정원2.jpg" alt="" title="img">--}}
{{--                        <img src="../../../public/img/garden/그레이스정원3.jpg" alt="" title="img">--}}
{{--                        <img src="../../../public/img/garden/그레이스정원4.jpg" alt="" title="img">--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
@endsection
