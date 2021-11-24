const URL = "https://teachablemachine.withgoogle.com/models/5wGaA5eyv/";
let model, webcam, labelContainer, maxPredictions;

async function init() {
    const modelURL = URL + "model.json";
    const metadataURL = URL + "metadata.json";

    model = await tmImage.load(modelURL, metadataURL);
    maxPredictions = model.getTotalClasses();


    labelContainer = document.getElementById("label-container");
    for (let i = 0; i < maxPredictions; i++) { 
        labelContainer.appendChild(document.createElement("div"));
    }
}

async function predict() {
    var image = document.getElementById("DrawingToPhotoimage")
    const prediction = await model.predict(image, false);
    prediction.sort((a,b) => parseFloat(b.probability) - parseFloat(a.probability));
    switch(prediction[0].className){
        case "1.dog":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/1.dog.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>강아지</span>";
        break;
        case "2.scissors":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/2.scissors.jpg\"width = 300px height = 700px> <span style=font-size:40px><br>가위</span>";
        break;
        case "3.eggplant":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/3.eggplant.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>가지</span>";
        break;
        case "4.bag":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/4.bag.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>가방</span>";
        break;
        case "5.goose":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/5.goose.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>거위</span>";
        break;
        case "6.egg":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/6.egg.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>계란</span>";
        break;
        case "7.meat":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/7.meat.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>고기</span>";
        break;
        case "8.cat":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/8.cat.jpg\"width = 500px height = 300px> <span style=font-size:40px><br>고양이</span>";
        break;
        case "9.pepper":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/9.pepper.jpg\"width = 400px height = 400px> <span style=font-size:40px><br>피망,고추</span>";
        break;
        case "10.golfclub":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/10.golfclub.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>골프채</span>";
        break;
        case "11.cloud":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/11.cloud.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>구름</span>";
        break;
        case "12.Orange":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/12.Orange.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>오렌지</span>";
        break;
        case "13.train":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/13.train.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>기차</span>";
        break;
        case "14.kimchi":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/14.kimchi.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>김치</span>";
        break;
        case "15.fishingrod":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/15.fishingrod.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>낚시대</span>";
        break;
        case "16.basketball":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/16.basketball.jpg\"width = 400px height = 400px> <span style=font-size:40px><br>농구공</span>";
        break;
        case "17.snow":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/17.snow.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>눈snow</span>";
        break;
        case "18.eye":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/18.eye.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>눈eye</span>";
        break;
        case "19.tree":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/19.tree.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>나무</span>";
        break;
        case "20.snowman":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/20.snowman.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>눈사람</span>";
        break;
        case "21.crescent":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/21.crescent.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>초승달</span>";
        break;
        case "22.semicircle":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/22.semicircle.jpg\"width = 400px height = 400px> <span style=font-size:40px><br>반달</span>";
        break;
        case "23.circle":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/23.circle.jpg\"width = 400px height = 400px> <span style=font-size:40px><br>원</span>";
        break;
        case "24.carrot":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/24.carrot.jpg\"width = 400px height = 500px> <span style=font-size:40px><br>당근</span>";
        break;
        case "25.koreanpeninsula":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/25.koreanpeninsula.jpg\"width = 400px height = 400px> <span style=font-size:40px><br>한반도</span>";
        break;
        case "26.koreanFlag":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/26.koreanFlag.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>태극기</span>";
        break;
        case "27.pig":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/27.pig.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>돼지</span>";
        break;
        case "28.strawberry":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/28.strawberry.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>딸기</span>";
        break;
        case "29.radio":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/29.radio.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>라디오</span>";
        break;
        case "30.beer":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/30.beer.jpg\"width = 400px height = 500px> <span style=font-size:40px><br>맥주</span>";
        break;
        case "31.horse":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/31.horse.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>말</span>";
        break;
        case "32.hat":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/32.hat.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>모자</span>";
        break;
        case "33.necklace":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/33.necklace.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>목걸이</span>";
        break;
        case "34.flower":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/34.flower.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>꽃</span>";
        break;
        case "35.door":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/35.door.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>문</span>";
        break;
        case "36.bus":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/36.bus.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>버스</span>";
        break;
        case "37.star":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/37.star.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>별</span>";
        break;
        case "38.cup":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/38.cup.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>컵</span>";
        break;
        case "39.video":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/39.video.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>비디오테이프</span>";
        break;
        case "40.airplane":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/40.airplane.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>비행기</span>";
        break;
        case "41.bread":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/41.bread.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>빵</span>";
        break;
        case "42.apple":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/42.apple.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>사과</span>";
        break;
        case "43.chicken":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/43.chicken.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>치킨</span>";
        break;
        case "44.box":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/44.box.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>박스</span>";
        break;
        case "45.bird":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/45.bird.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>새</span>";
        break;
        case "46.sandwich":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/46.sandwich.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>샌드위치</span>";
        break;
        case "47.fish":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/47.fish.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>물고기</span>";
        break;
        case "48.fan":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/48.fan.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>선풍기</span>";
        break;
        case "49.hand":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/49.hand.jpg\"width = 300px height = 600px> <span style=font-size:40px><br>손</span>";
        break;
        case "50.spoon":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/50.spoon.jpg\"width = 400px height = 500px> <span style=font-size:40px><br>숟가락</span>";
        break;
        case "51.watch":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/51.watch.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>시계</span>";
        break;
        case "52.paper":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/52.paper.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>종이</span>";
        break;
        case "53.socks":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/53.socks.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>양말</span>";
        break;
        case "54.mouse":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/54.mouse.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>쥐</span>";
        break;
        case "55.triangle":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/55.triangle.png\"width = 400px height = 300px> <span style=font-size:40px><br>삼각형</span>";
        break;
        case "56.arrow":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/56.arrow.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>화살표</span>";
        break;
        case "57.milk":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/57.milk.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>우유</span>";
        break;
        case "58.maple":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/58.maple.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>단풍잎</span>";
        break;
        case "59.tv":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/59.tv.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>텔레비전</span>";
        break;
        case "60.chair":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/60.chair.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>의자</span>";
        break;
        case "61.desk":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/61.desk.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>책상</span>";
        break;
        case "62.mail":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/62.mail.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>메일</span>";
        break;
        case "63.wifi":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/63.wifi.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>와이파이</span>";
        break;
        case "64.lips":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/64.lips.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>입술</span>";
        break;
        case "65.nose":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/65.nose.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>코</span>";
        break;
        case "66.car":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/66.car.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>자동차</span>";
        break;
        case "67.bicycle":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/67.bicycle.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>자전거</span>";
        break;
        case "68.cellphone":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/68.cellphone.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>핸드폰</span>";
        break;
        case "69.chopsticks":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/69.chopsticks.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>젓가락</span>";
        break;
        case "70.mountain":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/70.mountain.jpg\"width = 500px height = 300px> <span style=font-size:40px><br>산</span>";
        break;
        case "71.school":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/71.school.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>학교</span>";
        break;
        case "72.window":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/72.window.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>창문</span>";
        break;
        case "73.chocolate":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/73.chocolate.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>초콜릿</span>";
        break;
        case "74.toothbrush":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/74.toothbrush.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>칫솔</span>";
        break;
        case "75.camera":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/75.camera.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>카메라</span>";
        break;
        case "76.knife":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/76.knife.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>칼</span>";
        break;
        case "77.coffee":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/77.coffee.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>커피</span>";
        break;
        case "78.key":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/78.key.jpg\"width = 600px height = 300px> <span style=font-size:40px><br>열쇠</span>";
        break;
        case "79.tomato":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/79.tomato.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>강아지</span>";
        break;
        case "80.cylinder":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/80.cylinder.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>원통</span>";
        break;
        case "81.tshirt":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/81.Tshirt.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>티셔츠</span>";
        break;
        case "82.grape":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/82.grape.jpg\"width = 500px height = 300px> <span style=font-size:40px><br>포도</span>";
        break;
        case "83.pizza":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/83.pizza.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>피자</span>";
        break;
        case "84.hamburger":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/84.hamburger.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>햄버거</span>";
        break;
        case "85.sun":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/85.sun.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>해</span>";
        break;
        case "86.trashcan":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/86.trashcan.jpg\"width = 400px height = 300px> <span style=font-size:40px><br>쓰레기통</span>";
        break;
        case "87.youtube":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/87.youtube.jpg\"width = 500px height = 300px> <span style=font-size:40px><br>유튜브</span>";
        break;
        case "88.One":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/88.One.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 1</span>";
        break;
        case "89.two":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/89.two.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 2</span>";
        break;
        case "90.three":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/90.three.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 3</span>";
        break;
        case "91.four":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/91.four.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 4</span>";
        break;
        case "92.five":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/92.five.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 5</span>";
        break;
        case "93.six":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/93.six.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 6</span>";
        break;
        case "94.seven":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/94.seven.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 7</span>";
        break;
        case "95.eight":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/95.eight.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 8</span>";
        break;
        case "96.nine":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/96.nine.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 9</span>";
        break;
        case "97.zero":
            image = "<img src = \"cawlingMainImage/cawlingMainImage/97.zero.jpg\"width = 300px height = 400px> <span style=font-size:40px><br>숫자 0</span>";
        break;
        
    }
    $('.result-image').html(image);
    
}
