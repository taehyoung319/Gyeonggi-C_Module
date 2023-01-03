@extends('layout')

@section('contents')
    <section id="infor" class="la container">
        <div class="container">
            <div class="textBox mb-5 d-flex justify-content-between align-items-end">
                <div>
                    <span class="point"></span>
                    <h3 class="pp bbb">정원 안내 페이지</h3>
                    <h1 class="pp bbb title">GYEONGNAM GARDEN <br> INFROMATION</h1>
                </div>
                <div class="btn-group">
                    <button class="btn btn-outline-success" onclick="location.href='{{route('gardenPage', ['sort' => 'desc'])}}'">별점 내림차순</button>
                    <button class="btn btn-outline-success" onclick="location.href='{{route('gardenPage', ['sort' => 'asc'])}}'">별점 올림차순</button>
                </div>
            </div>
            <div class="gardenList d-flex justify-content-between align-items-center flex-wrap">

                @foreach($garden as $idx => $g)
                    <a href="{{route('gardenMorePage',$g->id)}}">
                        <div class="item d-flex justify-content-center align-items-center mb-5 position-relative one bb" style="@if($idx == 0 || $idx == 1 || $idx == 2) box-shadow: 0 0 8px 8px var(--g1); @endif">
                            <img src="{{asset($g->image)}}" alt="img" title="img" class="position-absolute one">
                            <div class="p-5 textBoxs position-absolute">
                                <h3 class="bbb">{{$g->name}}</h3>
                                <p>순위 : {{$idx + 1}}</p>
                                <p>{{$g->address}}</p>
                                <p>{{$g->phone}}</p>
                                <p>별점 : {{$g->score}}</p>
                            </div>
                        </div>
                    </a>
                @endforeach


            </div>
        </div>
    </section>
@endsection
