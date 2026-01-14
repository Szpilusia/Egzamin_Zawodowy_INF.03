function Function1() {
  let Blur = document.getElementById("blur");
  let Sepia = document.getElementById("sepia");
  let Negatyw = document.getElementById("negatyw");
  let img1 = document.getElementById("imgs1");

  if (Blur.checked == true) {
    img1.style.filter = "blur(5px)";
  } else if (Sepia.checked == true) {
    img1.style.filter = "sepia(100%)";
  } else if (Negatyw.checked == true) {
    img1.style.filter = "invert(100%)";
  }
}

function Function2(x) {
  let img2 = document.getElementById("imgs2");

  if (x == 1) {
    img2.style.filter = "grayscale(0%)";
  } else if (x == 2) {
    img2.style.filter = "grayscale(100%)";
  }
}

function Function3() {
  let img3 = document.getElementById("imgs3");
  let opa = document.getElementById("Opacity").value;

  img3.style.opacity = `${opa}` + "%";
}

function Function4() {
  let img4 = document.getElementById("imgs4");
  let light = document.getElementById("Light").value;

  img4.style.filter = "brightness(" + `${light}` + "%)";
}
