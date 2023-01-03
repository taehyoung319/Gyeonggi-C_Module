// 초기화
const APP = {
    garden: [],
    min: {x: 127.5718, y: 34.7100},
    max: {x: 129.2097, y: 35.9255},
}

// 세팅
const setEvent = () => {
    $(document)
        .on('change', '#select', function () {
            const select = $(this).val();
            const data = APP.garden.gardens.filter(res => res.name == select);
            map(data);
        })
        .on('click', '.viewer', function() {
            window.open('./viewer.html', '_blank',
                `width=1920 height=1080`, 'fullscreen=yes');
        })
}

// 맵
const map = (data) => {
    console.log(data);

    $('.in_card').html(`
        <div class="card">
            <div class="card-header">
                <h5 class="pp bbb">${data[0].name}</h5>
            </div>
            <div class="card-body">
                <img src="${data[0].image}" alt="" style="width: 662px; height: 350px; object-fit: cover;">
                <p>정원이름 | ${data[0].name}</p>
                <p>별점 | ${data[0].score}</p>
                <p>주소 | ${data[0].address}</p>
                <p>관리기관 연락처 | ${data[0].phone}</p>
            </div>
            <div class="card-footer d-flex justify-content-center align-items-center">
                <button class="btn btn-outline-success">리뷰 바로가기</button>
                <button class="btn btn-outline-success m-1">예약 바로가기</button>
                <button class="btn btn-outline-success viewer" data-garden="${data[0].name}">360 버튼</button>
            </div>
        </div>
    `)

    $('.posikBox span').css('background', 'gray');
    $('.posikBox span').css('box-shadow', 'none');
    $('.posikBox span').each((_,ele) => {
        if($(ele).attr('data-garden') == data[0].name) {
            $(ele).css('background', 'red');
            $(ele).css('z-index', 101);
            $(ele).css('box-shadow', '0 0 5px 5px var(--g1)');
        }
    })
}

// 초기설정
const setting = async () => {
    let json = await fetch('garden.json').then(res => res.json());
    APP.garden = json;

    const option = json.gardens.reduce((acc, cur) => {
        return acc += `
            <option value="${cur.name}">${cur.name}</option>
        `;
    }, '')
    $('#select').append(option);

    APP.garden.gardens.forEach(item => {
        let x = (item.longitude - APP.min.x) / (APP.max.x - APP.min.x) * 100;
        let y = 100 - (item.latitude - APP.min.y) / (APP.max.y - APP.min.y) * 100;

        $('.posikBox').append(`
            <span style="display: block; width: 20px; height: 20px; 
            background: gray; position: absolute; top: ${y}%;
            left: ${x}%; border-radius: 100px;" data-garden="${item.name}">
            </span>
        `);
    })
}

// 초기화
$(() => {
    setEvent();
    setting();

})