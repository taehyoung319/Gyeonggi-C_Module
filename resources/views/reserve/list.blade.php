@extends('layout')

@section('script')
    <script>
        $(() => {
            $(document)
                .on('mousemove', '.starBox img', function() {
                    $('.starBox img').removeClass('active');
                    const score = $(this).attr('data-score');
                    $('input[name=score]').val(Number(score));
                    $('.starBox img').each((_, item) => {
                        const s = Number($(item).attr('data-score'))
                        if(s <= score) $(item).addClass('active');
                    })
                })
                .on('click', '.tagList span', function() {
                    if($(this).hasClass('btn-outline-success')) {
                        $(this).addClass('btn-success').removeClass('btn-outline-success');
                        $('.tagList').append(`<input type="hidden" name="tag[]">`);
                    }else{
                        $(this).removeClass('btn-success').addClass('btn-outline-success');
                    }
                })
        })
    </script>
@endsection


@section('contents')
    <section id="reserve_list" class="la container">
        <div class="textBox mb-5">
            <span class="point"></span>
            <h3 class="pp bbb">예약 내역 페이지</h3>
            <h1 class="pp bbb title">GYEONGNAM GARDEN <br> RESERVE LIST</h1>
        </div>
        @if(auth()->user()->type === 'user')
        <h3 class="pp bbb">일반회원의 예약내역</h3>
        <table class="table text-center mb-5">
            <thead>
                <tr>
                    <td>방문날짜</td>
                    <td>방문할정원</td>
                    <td>방문인원</td>
                    <td>결제금액</td>
                    <td>예약취소 버튼</td>
                    <td>입장권 버튼</td>
                </tr>
            </thead>
            <tbody>
                @foreach($reserve as $r)
                    <tr>
                        <td>{{$r->start_dt}}</td>
                        <td>{{$r->garden->name}}</td>
                        <td>{{$r->person}}</td>
                        <td>{{$r->money}}</td>
                        <td>
                            <form action="{{route('reserveCancel')}}" method="post">
                                <input type="hidden" name="id" value="{{$r->id}}">
                                <button class="btn btn-outline-danger" type="submit">예약 취소 버튼</button>
                            </form>
                        </td>
                        <td><button class="btn btn-outline-success">입장권 버튼</button></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
            <h3 class="pp bbb">일반회원의 종료된 예약내역</h3>
            <table class="table text-center">
                <thead>
                <tr>
                    <td>방문날짜</td>
                    <td>방문할정원</td>
                    <td>방문인원</td>
                    <td>결제금액</td>
                    <td>방문여부</td>
                    <td>후기작성</td>
                </tr>
                </thead>
                <tbody>
                @foreach($stop as $s)
                    <tr>
                        <td>{{$s->start_dt}}</td>
                        <td>{{$s->garden->name}}</td>
                        <td>{{$s->person}}</td>
                        <td>{{$s->money}}</td>
                        <td>
                            @if($s->state == 'cancel')
                                취소
                            @elseif($s->state == 'visit' && date('Y-m-d') > $s->start_dt)
                                방문
                            @endif
                        </td>
                        <td>
                            @if($s->state == 'cancel')
                            @elseif($s->state == 'visit' && date('Y-m-d') > $s->start_dt && !$s->review)
                                <button class="btn btn-outline-success" data-target="#review_{{$s->id}}" data-toggle="modal" onclick="$('#review_{{$s->id}}').modal('show')">후기 작성</button>
                                <div class="modal fade" id="review_{{$s->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{route('reviewAction')}}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="garden_id" value="{{$s->garden->id}}">
                                            <input type="hidden" name="reserve_id" value="{{$s->id}}">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">후기 작성</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <span>별점</span>
                                                    <div class="d-flex justify-content-center align-items-center starBox">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star" data-score="1">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star right" data-score="2">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star" data-score="3">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star right" data-score="4">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star" data-score="5">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star right" data-score="6">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star" data-score="7">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star right" data-score="8">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star" data-score="9">
                                                        <img src="{{asset('public/img/star.png')}}" alt="" class="star right" data-score="10">
                                                    </div>
                                                    <input type="hidden" name="score" value="">
                                                    <span>내용</span>
                                                    <input type="text" name="contents" class="form-control">
                                                    <span>파일</span>
                                                    <input type="file" name="file" class="form-control">
                                                    <span>태그목록</span>
                                                    <div class="d-flex flex-wrap tagList">
                                                        <span class="btn btn-outline-success" data-tag="자연적인">자연적인 </span>
                                                        <span class="btn btn-outline-success" data-tag="광활한">광활한 </span>
                                                        <span class="btn btn-outline-success" data-tag="가족여행">가족여행 </span>
                                                        <span class="btn btn-outline-success" data-tag="관광">관광 </span>
                                                        <span class="btn btn-outline-success" data-tag="등산">등산 </span>
                                                        <span class="btn btn-outline-success" data-tag="휴식">휴식 </span>
                                                        <span class="btn btn-outline-success" data-tag="연인여행">연인여행 </span>
                                                        <span class="btn btn-outline-success" data-tag="친구여행">친구여행 </span>
                                                        <span class="btn btn-outline-success" data-tag="자연탐구">자연탐구 </span>
                                                        <span class="btn btn-outline-success" data-tag="울창한">울창한 </span>
                                                        <span class="btn btn-outline-success" data-tag="숲">숲 </span>
                                                        <span class="btn btn-outline-success" data-tag="꽃밭">꽃밭 </span>
                                                        <span class="btn btn-outline-success" data-tag="아름다운">아름다운 </span>
                                                        <span class="btn btn-outline-success" data-tag="평화로운">평화로운 </span>
                                                        <span class="btn btn-outline-success" data-tag="멋진">멋진 </span>
                                                        <span class="btn btn-outline-success" data-tag="산림">산림 </span>
                                                        <span class="btn btn-outline-success" data-tag="체험장">체험장 </span>
                                                        <span class="btn btn-outline-success" data-tag="휴양시설">휴양시설 </span>
                                                        <span class="btn btn-outline-success" data-tag="깔끔한">깔끔한 </span>
                                                        <span class="btn btn-outline-success" data-tag="관리">관리 </span>
                                                        <span class="btn btn-outline-success" data-tag="강">강 </span>
                                                        <span class="btn btn-outline-success" data-tag="국가관광지">국가관광지 </span>
                                                        <span class="btn btn-outline-success" data-tag="나홀로여행">나홀로여행 </span>
                                                        <span class="btn btn-outline-success" data-tag="낚시">낚시 </span>
                                                        <span class="btn btn-outline-success" data-tag="공원">공원 </span>
                                                        <span class="btn btn-outline-success" data-tag="들판">들판 </span>
                                                        <span class="btn btn-outline-success" data-tag="산">산 </span>
                                                        <span class="btn btn-outline-success" data-tag="시원한">시원한 </span>
                                                        <span class="btn btn-outline-success" data-tag="활동적인">활동적인 </span>
                                                        <span class="btn btn-outline-success" data-tag="향긋한">향긋한 </span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
                                                    <button type="submit" class="btn btn-primary">등록</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h3 class="pp bbb">해당 정원의 예약내역</h3>
            <table class="text-center table mb-5">
                <thead>
                    <tr>
                        <td>방문날짜</td>
                        <td>방문할인원</td>
                        <td>결제금액</td>
                        <td>예약취소버튼</td>
                        <td>상태</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reserve as $r)
                        <tr>
                            <td>{{$r->start_dt}}</td>
                            <td>{{$r->person}}</td>
                            <td>{{$r->money}}</td>
                            <td>
                                @if($r->state == 'cancel')

                                @elseif($r->state == 'visit' && date('Y-m-d') > $r->start_dt)

                                @else
                                    <form action="{{route('reserveCancel')}}" method="post">
                                        <input type="hidden" class="form-control" value="{{$r->id}}" name="id">
                                        <button class="btn btn-outline-danger" type="submit">예약 취소 버튼</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if($r->state == 'cancel')
                                    취소
                                @elseif($r->state == 'visit' && date('Y-m-d') > $r->start_dt)
                                    방문
                                @else
                                    예약
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h3 class="pp bbb">해당 정원의 예약관리 영역</h3>
            <table class="text-center table mb-5">
                <thead>
                    <tr>
                        <td>불가능 한 날짜</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach($stop as $s)
                        <tr>
                            <td>{{$s->date}}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <form action="{{route('reserveStop')}}" method="post" class="d-flex">
                <input type="date" class="form-control" name="date">
                <button class="btn btn-outline-success" type="submit">저장</button>
            </form>
        @endif
    </section>
@endsection

