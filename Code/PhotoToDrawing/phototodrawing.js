const PTDmodel = new mi.ArbitraryStyleTransferNetwork();
const canvas = document.getElementById('stylized1');
const ctx = canvas.getContext('2d');
const contentImg = document.getElementById('content');
const styleImg = document.getElementById('style');
const loading = document.getElementById('PTDloading');
const notLoading = document.getElementById('ready');

setupDemo();

// style transfer setup
function setupDemo() {
  PTDmodel.initialize().then(() => {
    stylize();
  });
}


async function clearCanvas() {
  await mi.tf.nextFrame();
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  await mi.tf.nextFrame();
}
  
// content 이미지의 너비 높이 값을 가지고 와서 style 이미지를 이용해 스타일링 하는 함수
async function stylize() {
  await clearCanvas();
  
  canvas.width = contentImg.width;
  canvas.height = contentImg.height;
  
  PTDmodel.stylize(contentImg, styleImg).then((imageData) => {
    stopLoading();
    ctx.putImageData(imageData, 0, 0);
  });
}
// 이미지파일을 읽고 이미지를 이용해 스타일링 하는 함수 
function loadImage1(event, imgElement) {
  const reader = new FileReader();
  reader.onload = (e) => {
    imgElement.src = e.target.result;
    startLoading();
    stylize();
  };
  reader.readAsDataURL(event.target.files[0]);
}

// load content image
function loadContent1(event) {
  loadImage1(event, contentImg);
}
// load style image
function loadStyle1(event) {
  loadImage1(event, styleImg);
}

function startLoading() {
  loading.hidden = false;
  notLoading.hidden = true;  
  canvas.style.opacity = 0;
}

function stopLoading() {
  loading.hidden = true;
  notLoading.hidden = false; 
  canvas.style.opacity = 1;
}