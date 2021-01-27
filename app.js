const slide_points = document.querySelector(".bar-slide");
const points = slide_points.children;

const button_before = document.querySelector("#before");
const button_after = document.querySelector("#after");

const caja_slide = document.querySelector(".silder-cont div");

button_before.addEventListener("click", ()=>{ cambiar(1)});
button_after.addEventListener("click", () => { cambiar(2)});

var pos = 0;

function cambiar(n) {
    if (n == 1) {
        if (pos == 0) {
            pos = 2;
        }else{
            pos--;
        }
    }else{
      if (pos == 2) {
          pos = 0;
      }else{
          pos++;
      }
    }
    for (let i = 0; i < points.length; i++) {
        if (points[i].classList[0] == "activo") {
            points[i].classList.remove('activo'); 
        }
    }
    points[pos].classList.add("activo");
    switch (pos) {
        case 0:
            caja_slide.style.marginLeft = "0vw";
            break;
        case 1:
            caja_slide.style.marginLeft = "-90vw";
            break;
        case 2:
            caja_slide.style.marginLeft = "-180vw";
            break;
    
        default:
            break;
    }
}

const button_op = document.getElementById("op");
button_op.addEventListener("click", ()=>{
    document.querySelector(".top-container").style.display = "none";
});
const button_op1 = document.getElementById("op1");
button_op1.addEventListener("click", ()=>{
    document.querySelector(".top-container").style.display = "none";
});
