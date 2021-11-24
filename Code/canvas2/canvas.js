function _(selector){
  return document.querySelector(selector);
}

function setup(){
	
  let canvas = createCanvas(1000, 600);
  canvas.parent("canvas-wrapper");
  background(255);
}
function mouseDragged(){
  let type = _("#pen-pencil").checked?"pencil":"";
  let color = _("#pen-color").value;
  fill(color);
  stroke(color);
  if(type == "pencil"){
    line(pmouseX, pmouseY, mouseX, mouseY);
  }
}
_("#reset-canvas").addEventListener("click", function(){
  background(255);
});
_("#save-canvas").addEventListener("click",function(){
  saveCanvas(".canvas", "sketch", "jpg");
});