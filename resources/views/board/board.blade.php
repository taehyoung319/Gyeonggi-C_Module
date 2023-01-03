@extends('layout')

@section('contents')
    <section id="123123123" class="la container">
        <div class="textBox">
            <span class="point"></span>
            <h3 class="pp bbb">정원 소식지 페이지</h3>
            <h1 class="pp bbb title">GYEONGNAM GARDEN <br> GARDEN PAGE</h1>
        </div>
        <div class="w-100">
            <h3 class="pp bbb">소식지 리스트</h3>
            <div class="gardenList d-flex flex-wrap mb-5">
                <button class="btn btn-outline-success" onclick="location.href='{{route('boardViewPage', 'all')}}'">전체소식지</button>
                @foreach(\App\Garden::all() as $g)
                    <button class="btn btn-outline-success" onclick="location.href='{{route('boardViewPage', $g->id)}}'">{{$g->name}}소식지</button>
                @endforeach
            </div>
            <h3 class="pp bbb">공지 리스트</h3>
            <table class="table text-center pp" style="color: #000;">
                <thead>
                    <tr>
                        <td>게시판</td>
                        <td>글번호</td>
                        <td>글쓴이</td>
                        <td>작성일시</td>
                        <td>조회수</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($top as $t)
                        <tr onclick="location.href='{{route('boardViewPage',$t->id)}}'">
                            <td>{{$t->garden->name}}게시판</td>
                            <td>{{$t->id}}</td>
                            <td>{{$t->user->id}}</td>
                            <td>@if( date('Y-m-d H:i:s') > date('Y-m-d', strtotime($t->date.'+1 days'))) {{explode(' ', $t->date)[0]}} @else {{$t->date}} @endif</td>
                            <td>{{$t->view}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h3 class="pp bbb">글 리스트</h3>
            <table class="table text-center pp" style="color: #000;">
                <thead>
                <tr>
                    <td>게시판</td>
                    <td>글번호</td>
                    <td>글쓴이</td>
                    <td>작성일시</td>
                    <td>조회수</td>
                </tr>
                </thead>
                <tbody>
                @foreach($bottom as $b)
                    <tr onclick="location.href='{{route('boardViewPage',$b->id)}}'">
                        <td>{{$b->garden->name}}게시판</td>
                        <td>{{$b->id}}</td>
                        <td>{{$b->user->id}}</td>
                        <td>@if( date('Y-m-d H:i:s') > date('Y-m-d', strtotime($b->date.'+1 days'))) {{explode(' ', $b->date)[0]}} @else {{$b->date}} @endif</td>
                        <td>{{$b->view}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
