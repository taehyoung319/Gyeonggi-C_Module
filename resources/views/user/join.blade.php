@extends('layout')


@section('contents')
    <section id="joinPage" class="la container d-flex justify-content-center align-items-center">
        <form action="{{route('joinAction')}}" method="post" class="col-6">
            <div class="textBox mb-5">
                <span class="point"></span>
                <h3 class="pp bbb">회원가입 페이지</h3>
                <h1 class="pp bbb title">GYEONGNAM GARDEN <br> JOIN PAGE</h1>
            </div>
            <span>아이디</span>
            <input type="text" name="id" class="form-control"><br>
            <span>비밀번호</span>
            <input type="text" name="pw" class="form-control"><br>
            <span>이름</span>
            <input type="text" name="name" class="form-control"><br>
            <button class="btn btn-success form-control" type="submit">회원가입</button><br><br>
        </form>
    </section>
@endsection
