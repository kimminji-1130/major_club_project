const imageList = document.querySelector('.image-list');
const btns = document.querySelectorAll('.view-options button');
const imageListItems = document.querySelectorAll('.image-list li');
const active = 'active';
const listView = 'list-view';
const gridView = 'grid-view';
const dNone = 'd-none';

//버튼 활성화
for (const btn of btns) {
    btn.addEventListener('click', function () {
        const parent = this.parentElement;
        document.querySelector('.view-options .active').classList.remove(active);
        parent.classList.add(active);

        if (parent.classList.contains('show-list')) {
            parent.previousElementSibling.previousElementSibling.classList.add(dNone);
            imageList.classList.remove(gridView);
            imageList.classList.add(listView);

        } else {
            parent.previousElementSibling.classList.add(dNone);
            imageList.classList.remove(listView);
            imageList.classList.add(gridView);
        }
    });
}

//리스트 너비 조절 Range 스크립트
const rangeInput = document.querySelector('input[type="range"]');

rangeInput.addEventListener('input', function () {
    //this.value
    document.documentElement.style.setProperty('--minRangeValue', `${this.value}px`);
    //선택지.style.css속성명 = 값
    //선택지.style.bacjgroundColor = 'blue';
    //선택지.style.setProperty('background-color','blue');
});

//검색키워드로 필터적용

const captions = document.querySelectorAll('.image-list figcaption p:first-child');
const myArray = [];
let counter = 1;

for(const caption of captions){
    myArray.push({
        id:counter++,
        text:caption.textContent
    });
}

console.log(myArray);

const searchInput = document.querySelector('input[type="search"]');
const photosCounter = document.querySelector('.toolbar .counter span');

searchInput.addEventListener('keyup', keyupHandler);
//ketdown (nnnnnn => n), keypress(nnnn => nnnn)
function keyupHandler(){
    for(const item of imageListItems){
        item.classList.add(dNone);
    }
    const keywords = this.value;

    const filterArray = myArray.filter(el => el.text.toLowerCase().includes(keywords.toLowerCase()));
    console.log(filterArray);

    if(filterArray.length > 0){
        for(const el of filterArray){
            //.image-list li:nth-child(el.id)
            document.querySelector(`.image-list li:nth-child(${(el.id)})`).classList.remove(dNone);
        }
    }
    photosCounter.textContent = filterArray.length;
}

