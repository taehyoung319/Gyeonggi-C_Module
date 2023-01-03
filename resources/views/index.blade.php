@extends('layout')

@section('contents')
<!--        추천-->
        <section id="recom" class="la position-relative">
            <img src="public/img/o_one.png" alt="img" title="img" class="position-absolute design1">
            <div class="container">
                <div class="textBox mb-5">
                    <span class="point"></span>
                    <h3 class="pp bbb">추천 정원 영역</h3>
                    <h1 class="pp bbb title">GYEONGNAM GARDEN <br> RECOMMEND</h1>
                </div>
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <div class="w-100 changeBox position-relative one d-flex justify-content-center align-items-center one bb">
                        <img src="public/img/img/13.jpg" alt="img" title="img"  class="position-absolute one">
                    </div>
                    <div class="textBoxs">
                        <div class="textSlide d-flex">
                            <div class="text d-flex flex-column justify-content-center align-items-start">
                                <h1 class="pp bbb">나폴리농원</h1>
                                <span class="d-block pan"></span>
                                <h5 class="pp mb-3">장소: 경상남도 통영시 산양읍 미륵산길 152</h5>
                                <h5 class="pp mb-3">관리시설: 나폴리농원</h5>
                                <h5 class="pp mb-3">테마: 등산길, 자연적, 휴양지, 시원</h5>
                                <h5 class="pp mb-3">별점: 5</h5>
                                <div class="w-100 d-flex justify-content-between align-items-end moreBox">
                                    <span class="mores"></span>
                                    <a href="#"><h3 class="m-0 pp bbb">MOREVIEW</h3></a>
                                </div>
                            </div>
                            <div class="text d-flex flex-column justify-content-center align-items-start">
                                <h1 class="pp bbb">사천식물랜드</h1>
                                <span class="d-block pan"></span>
                                <h5 class="pp mb-3">장소: 경상남도 사천시 용현면 덕곡리 82-4 일원</h5>
                                <h5 class="pp mb-3">관리시설: 사천식물랜드</h5>
                                <h5 class="pp mb-3">테마: 꽃길, 관광지, 광활</h5>
                                <h5 class="pp mb-3">별점: 3</h5>
                                <div class="w-100 d-flex justify-content-between align-items-end moreBox">
                                    <span class="mores"></span>
                                    <a href="#"><h3 class="m-0 pp bbb">MOREVIEW</h3></a>
                                </div>
                            </div>
                            <div class="text d-flex flex-column justify-content-center align-items-start">
                                <h1 class="pp bbb">해솔찬정원</h1>
                                <span class="d-block pan"></span>
                                <h5 class="pp mb-3">장소: 경상남도 통영시 도산면 저산리 572-1</h5>
                                <h5 class="pp mb-3">관리시설: 해솔찬정원</h5>
                                <h5 class="pp mb-3">테마: 체험학습, 초원, 식물원</h5>
                                <h5 class="pp mb-3">별점: 8</h5>
                                <div class="w-100 d-flex justify-content-between align-items-end moreBox">
                                    <span class="mores"></span>
                                    <a href="#"><h3 class="m-0 pp bbb">MOREVIEW</h3></a>
                                </div>
                            </div>
                            <div class="text d-flex flex-column justify-content-center align-items-start">
                                <h1 class="pp bbb">나폴리농원</h1>
                                <span class="d-block pan"></span>
                                <h5 class="pp mb-3">장소: 경상남도 통영시 산양읍 미륵산길 152</h5>
                                <h5 class="pp mb-3">관리시설: 나폴리농원</h5>
                                <h5 class="pp mb-3">테마: 등산길, 자연적, 휴양지, 시원</h5>
                                <h5 class="pp mb-3">별점: 5</h5>
                                <div class="w-100 d-flex justify-content-between align-items-end moreBox">
                                    <span class="mores"></span>
                                    <a href="#"><h3 class="m-0 pp bbb">MOREVIEW</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--        갤러리-->
        <section id="gallery" class="la position-relative">
            <img src="public/img/s.png" alt="img" title="img" class="position-absolute design1">
            <div class="container">
                <div class="textBox mb-5">
                    <span class="point"></span>
                    <h3 class="pp bbb">갤러리 영역</h3>
                    <h1 class="pp bbb title">GYEONGNAM GARDEN <br> GALLERY</h1>
                </div>
                <div class="gBox one container p-0">
                    <div class="imgSlide d-flex">
                        <div class="img position-relative">
                            <img src="public/img/img/11.jpg" alt="img" title="img" class="position-absolute">
                            <h1 class="text bbb position-absolute">중산자연휴양림</h1>
                        </div>
                        <div class="img position-relative">
                            <img src="public/img/img/12.jpg" alt="img" title="img" class=" position-absolute">
                            <h1 class="text bbb position-absolute">거창항노화힐링랜드</h1>
                        </div>
                        <div class="img position-relative">
                            <img src="public/img/img/13.jpg" alt="img" title="img" class=" position-absolute">
                            <h1 class="text bbb position-absolute">산림청 국립남해편백자연휴양림</h1>
                        </div>
                        <div class="img position-relative">
                            <img src="public/img/img/11.jpg" alt="img" title="img" class=" position-absolute">
                            <h1 class="text bbb position-absolute">중산자연휴양림</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!--        프로모션-->
        <section id="pro" class="la container">
            <div class="container">
                <div class="textBox mb-5">
                    <span class="point"></span>
                    <h3 class="pp bbb">프로모션 영역</h3>
                    <h1 class="pp bbb title">GYEONGNAM GARDEN <br> PROMOTION</h1>
                </div>
            </div>
            <div class="w-100 proList d-flex justify-content-between align-items-center">
                <div class="item bb flex-column align-items-center justify-content-center d-flex">
                    <i class="fa fa-phone-alt"></i>
                    <h3 class="pp bbb">1주 전 예약 시 20% 할인!</h3>
                    <div class="texts text-center">
                        <p class="pp">이수미팜베리정원</p>
                        <p class="pp">사천식물랜드</p>
                    </div>
                </div>
                <div class="item bb flex-column align-items-center justify-content-center d-flex">
                    <i class="fa fa-fan"></i>
                    <h3 class="pp bbb">경상남도 특산품 최대 30% 할인!</h3>
                    <div class="texts text-center">
                        <p class="pp">나폴리농원</p>
                        <p class="pp">사천식물랜드</p>
                    </div>
                </div>
                <div class="item bb flex-column align-items-center justify-content-center d-flex">
                    <i class="fa fa-fax"></i>
                    <h3 class="pp bbb">꽃밭 SNS 인생사진 이벤트!</h3>
                    <div class="texts text-center">
                        <p class="pp">나폴리농원</p>
                    </div>
                </div>
            </div>
        </section>
@endsection

