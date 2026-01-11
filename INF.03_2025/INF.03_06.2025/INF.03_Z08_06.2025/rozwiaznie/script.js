console.log("henlooo");

function Open(numb) {
  console.log(numb);

  let b1 = document.getElementById("b1");
  let b2 = document.getElementById("b2");
  let b3 = document.getElementById("b3");
  let s1 = document.getElementById("s1");
  let s2 = document.getElementById("s2");
  let s3 = document.getElementById("s3");

  if (numb == 1) {
    b1.style.backgroundColor = "MistyRose";
    s1.style.display = "block";

    b2.style.backgroundColor = "#FFAEA5";
    b3.style.backgroundColor = "#FFAEA5";

    s2.style.display = "none";
    s3.style.display = "none";
  } else if (numb == 2) {
    b2.style.backgroundColor = "MistyRose";
    s2.style.display = "block";

    b1.style.backgroundColor = "#FFAEA5";
    b3.style.backgroundColor = "#FFAEA5";

    s1.style.display = "none";
    s3.style.display = "none";
  } else {
    b3.style.backgroundColor = "MistyRose";
    s3.style.display = "block";

    b2.style.backgroundColor = "#FFAEA5";
    b1.style.backgroundColor = "#FFAEA5";

    s2.style.display = "none";
    s1.style.display = "none";
  }
}
