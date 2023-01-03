// 변수
const APP = {
    x : 0,
    y : 0,
    type : 1,
    drag : false
}

// 세팅
const setting = () => {
     if(APP.type == 1) {
         $('.__2').hide();
         $('.__1').show();
     }else{
         $('.__2').show();
         $('.__1').hide();
     }
}

// 이벤트
const setEvent = () => {
    $(document)
        .on('click','.move', function() {
            APP.type = APP.type == 1 ? APP.type = 0 : APP.type = 1;
            console.log(APP.type);
            setting();
        })
        .on('mousedown', function (){
            APP.drag = true;
        })
        //이벤트
        .on('mousemove', function (e){
            if(!APP.drag) return false;

            APP.x -= e.originalEvent.movementX / (screen.width / 180);
            APP.y += e.originalEvent.movementY / (screen.height / 180);

            APP.y = APP.y > 90 ? 90 : APP.y < -90 ? -90 : APP.y;

            $('.box').css('transform', `translateZ(var(--center)) rotateX(${APP.y}deg) rotateY(${APP.x}deg)`);
        })
        .on('mouseup', function (){
            APP.drag = false;
        })
        .on('keydown', function(e) {
            keySet(e.keyCode);
        })
}

// 키세팅
const keySet = (key) => {
    console.log(key);
    if(key == 38) {
        APP.y = APP.y + 2;
    }else if(key == 40){
        APP.y = APP.y - 2;
    }else if(key == 37){
        APP.x = APP.x - 2;
    }else if(key == 39) {
        APP.x = APP.x + 2;
    }

    APP.y = APP.y > 90 ? 90 : APP.y < -90 ? -90 : APP.y;

    $('.box').css('transform', `translateZ(var(--center)) rotateX(${APP.y}deg) rotateY(${APP.x}deg)`);
}

// 초기화
$(() => {
    setEvent();
    setting();
})