@extends('layout')

@section('script')
    <script>
        $(() => {
            $(document)
                .on('click', '.chk', function() {
                    $.ajax({
                        url:'{{route('reserveChk')}}',
                        type: 'post',
                        data: {
                            start_dt : $('input[name=start_dt]').val(),
                            person : $('input[name=person]').val(),
                            garden_id : '{{$data->id}}',
                        },
                        success: function(res) {
                            if(res == 0) {
                                return alert('예약 정보를 다시 입력해주세요.');
                            }else if(res == 1) {
                                return alert('예약이 불가한 날짜입니다.');
                            }else{
                                alert('예약이 가능합니다.');
                                $('input').attr('readonly', 'true');
                                $('input[name=money]').val(Number($('input[name=person]').val()) * 10000);
                                $('.reserveGo').removeAttr('disabled');
                            }
                        }
                    })
                })

        })
    </script>
@endsection

@section('contents')
    <section id="reserve_sign" class="la container d-flex justify-content-center align-items-center">
        <form action="{{route('reserveSignAction')}}" method="post" class="col-6">
            <input type="hidden" name="garden_id" value="{{$data->id}}">
            <div class="textBox">
                <span class="point"></span>
                <h3 class="pp bbb">{{$data->name}}의 정원 예약 페이지</h3>
                <h1 class="pp bbb title">GYEONGNAM GARDEN <br> RESERVE PAGE</h1>
            </div>
            <span>방문날짜</span>
            <input type="date" name="start_dt" class="form-control"><br>
            <span>방문인원</span>
            <input type="number" name="person" class="form-control" value="1" min="1"><br>
            <button class="btn btn-success form-control chk" type="button">예약 가능 여부 확인</button><br><br>
            <span>결제 금액</span>
            <input type="number" name="money" class="form-control" readonly><br>
            <button class="btn btn-success form-control reserveGo" type="submit" disabled>예약하기</button><br><br>
        </form>
    </section>
@endsection
