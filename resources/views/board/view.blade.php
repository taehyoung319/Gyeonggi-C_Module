@extends('layout')

@section('script')
    <style>
        @if($board->paste =='on')
            html, body { user-select: none; }
        @endif
    </style>

    <script>
        $(() => {
            @if($board->paste =='on')
                const title = '{{$board->title}}';
                const ip = '{{request()->ip()}}';
                for(let i = 0; i < 20; i++) {
                    $('.wart').append(`<p class="position-absolute" style="font-size: 30px; opacity: .5; left: ${i * 10}%;">${title}</p>`);
                    $('.wart').append(`<p class="position-absolute" style="font-size: 30px; opacity: .5; top: 125%; left: ${i * 10}%">${ip}</p>`);
                }
            @endif
        })
    </script>
@endsection

@section('contents')
    <section id="123123123" class="la container">
        <div class="textBox mb-5">
            <span class="point"></span>
            <h3 class="pp bbb">정원 소식지 페이지</h3>
            <h1 class="pp bbb title">GYEONGNAM GARDEN <br> GARDEN PAGE</h1>
        </div>
        <h3 class="pp bbb">글보기 페이지</h3>
        <p>제목 : {{$board->title}}</p>
        <p>글내용 : {{$board->contents}}</p>
        <p>작성자 : {{$board->user->name}}</p>
        <p>작성일 : {{$board->date}}</p>
        <p>댓글 수 : {{$board->com->count()}}</p>
        <div class="wart">

        </div>
        <h3 class="pp bbb">댓글</h3>
        <form action="{{route('boardCom')}}" method="post" class="d-flex">
            <input type="text" name="contents" class="form-control">
            <input type="hidden" name="board_id" class="form-control" value="{{$board->id}}">
            <button class="btn btn-outline-success" type="submit">댓글작성</button>
        </form>
        <h3 class="pp bbb">댓글목록</h3>
        <table class="table text-center">
            <thead>
            <tr>
                <td>작성자</td>
                <td>작성일</td>
                <td>내용</td>
            </tr>
            </thead>
            <tbody>

                @foreach($board->com as $c)
                    <tr>
                    <td>{{$c->user->name}}</td>
                    <td>{{$c->date}}</td>
                    <td>{{$c->contents}}</td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </section>
@endsection
