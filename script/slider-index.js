let count = document.getElementById("countpagesslider").value;
let slider = document.getElementById("slider");
let left_btn = document.getElementById("left-button-slider");
let right_btn = document.getElementById("right-button-slider");
let pageslider = 1;

function moveslider(n) {
  slider.style.left = "-" + (pageslider + n - 1) * 314 + "px";
}

right_btn.onclick = function () {
  if (pageslider < count) {
    moveslider(1);
    pageslider++;
  }
};
left_btn.onclick = function () {
  if (pageslider > 1) {
    moveslider(-1);
    pageslider--;
  }
};
