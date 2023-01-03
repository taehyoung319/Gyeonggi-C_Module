// 전역변수
const APP = {
    garden : [],
    themeList : [],
}
// 서치
const search = () => {
    let data = [];
    let keyword = $('#search').val();
    let keywordCho = cho($('#search').val());

    data = [];
    console.log(data);
    APP.garden.gardens.forEach(item => {
        if(keyword && $('.themeList .btn-success').length >= 1) {
            console.log('테마 and 검색어');
            let strIdx = [];
            let gardenName = item.name.split('');
            let gardenCho = cho(item.name);

            for(let i in gardenCho) {
                let idx = gardenCho.indexOf(keywordCho, i);
                if(idx !== -1 && strIdx.indexOf(idx) === -1) strIdx.push(idx);
            }

            let searchChk = false;

            strIdx.forEach(idx => {
                let str = keywordCho.split('');
                for(let i in keyword) {
                    if(keyword[i].charCodeAt() - 44032 >= 0)
                        str[i] = gardenName[idx + i * 1];
                }
                if(str.join('') === keyword){
                    for(let i = idx; i < idx + keyword.length; i++) {
                        searchChk = true;
                        gardenName[i] = `<span class="high">${gardenName[i]}</span>`;
                    }
                }
            })

            item.searchName = gardenName.join('');

            let t = [...item.themes];
            let themeChk = true;

            APP.themeList.forEach(theme => {
                if(!item.themes.includes(theme)) {
                    themeChk = false;
                }else{
                    t[item.themes.indexOf(theme)] =  `<span class="high">${t[item.themes.indexOf(theme)]}</span>`;
                }
            })

            item.newList = t;

            if(searchChk && themeChk) {
                data.push(item);
            }
        }
        // 테마 or 테마 검색
        if($('.themeList .btn-success').length >= 1 && !keyword) {
            console.log('테마 or 테마');
            let t = [...item.themes];
            let themeChk = true;

            // const t = json.gardens.reduce((acc, cur) => {
            //     acc.push(...cur.themes);
            //     acc = [...new Set(acc)];
            //     return acc;
            // }, []);

            APP.themeList.forEach(theme => {
                if(!item.themes.includes(theme)) {
                    themeChk = false;
                }else{
                    t[item.themes.indexOf(theme)] =  `<span class="high">${t[item.themes.indexOf(theme)]}</span>`;
                    data.push(item);
                    data = [...new Set(data)];
                }
            })
            item.newList = t;
        }
    })
    return data;
}

const searchBtn = () => {
    let data = [];
    let keyword = $('#search').val();
    let keywordCho = cho($('#search').val());

    APP.garden.gardens.forEach(item => {
        if(keyword && $('.themeList .btn-success').length == 0) {
            console.log('only 검색어');
            let strIdx = [];
            let gardenName = item.name.split('');
            let gardenCho = cho(item.name);

            for(let i in gardenCho) {
                let idx = gardenCho.indexOf(keywordCho, i);
                if(idx !== -1 && strIdx.indexOf(idx) === -1) strIdx.push(idx);
            }

            let searchChk = false;

            strIdx.forEach(idx => {
                let str = keywordCho.split('');
                for(let i in keyword) {
                    if(keyword[i].charCodeAt() - 44032 >= 0)
                        str[i] = gardenName[idx + i * 1];
                }
                if(str.join('') === keyword){
                    for(let i = idx; i < idx + keyword.length; i++) {
                        searchChk = true;
                        gardenName[i] = `<span class="high">${gardenName[i]}</span>`;
                        data.push(item);
                        data = [...new Set(data)];
                    }
                }
            })
            item.searchName = gardenName.join('');
            console.log(item);
        }
    });

    const html = data.reduce((acc, cur) => {
        return acc += `
            <div class="item d-flex justify-content-center flex-column flex-column">
                <img src="${cur.image}" alt="img">
                <div class="d-flex justify-content-between align-items-center">
                    <p>${!cur.searchName ? cur.name : cur.searchName}</p>
                    <p>${cur.themes.join(' ,')}</p>
                </div>
            </div>
        `;
    }, '')
    $('.gardenList').html(html);
}

// 보여주기
const view = async () => {
    let data = await search();
    console.log(data);
    const html = data.reduce((acc, cur) => {
        return acc += `
            <div class="item d-flex justify-content-center flex-column flex-column">
                <img src="${cur.image}" alt="img">
                <div class="d-flex justify-content-between align-items-center">
                    <p>${!cur.searchName ? cur.name : cur.searchName}</p>
                    <p>${!cur.newList ? cur.themes.join(' ,') : cur.newList.join(' ,')}</p>
                </div>
            </div>
        `;
    }, '');
    $('.gardenList').html(html);
}

// 초성만들어주기
const cho = str => {
    let res = '',
        choArr = ['ㄱ', 'ㄲ', 'ㄴ', 'ㄷ', 'ㄸ', 'ㄹ', 'ㅁ', 'ㅂ', 'ㅃ', 'ㅅ', 'ㅆ', 'ㅇ', 'ㅈ', 'ㅉ', 'ㅊ', 'ㅋ' ,'ㅌ', 'ㅍ', 'ㅎ'];
    for(let i in str) {
        let code = Math.floor((str[i].charCodeAt() - 44032) / 588);
        res += code >= 0 ? choArr[code] : str[i];
    }
    return res;
}


// 초기설정
const setting = async () => {
    let json = await fetch('garden.json').then(res => res.json());
    APP.garden = json;

    const t = json.gardens.reduce((acc, cur) => {
        acc.push(...cur.themes);
        acc = [...new Set(acc)];
        return acc;
    }, []);

    const g = json.gardens.reduce((acc, cur) => {
        return acc += `
            <div class="item d-flex justify-content-center flex-column flex-column">
                <img src="${cur.image}" alt="img">
                <div class="d-flex justify-content-between align-items-center">
                    <p>${cur.name}</p>
                    <p>${cur.themes.join(' ,')}</p>
                </div>
            </div>
        `;
    }, '')
    $('.themeList').html(t.map(res => `<button class="btn btn-outline-success theme" data-theme="${res}">${res}</button>`));
    $('.gardenList').html(g);
}

// 이벤트
const setEvent = () => {
    $(document)
        .on('input', '#search', view)
        .on('click', '.themeList .theme', function() {
            if($(this).hasClass('btn-success')) {
                $(this).removeClass('btn-success').addClass('btn-outline-success');
            }else{
                $(this).addClass('btn-success').removeClass('btn-outline-success');
            }
            APP.themeList = [];

            $('.themeList .btn-success').each((_, ele) => {
                APP.themeList.push($(ele).attr('data-theme'));
            })
            view();
        })
        .on('click', '.searchBtn', searchBtn)
}

// 초기화
$(() => {
    setEvent();
    setting();
})