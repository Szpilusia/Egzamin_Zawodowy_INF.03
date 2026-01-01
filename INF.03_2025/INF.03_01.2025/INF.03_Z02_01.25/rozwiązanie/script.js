function Oblicz() {
  let width = document.getElementById("width").value;
  let height = document.getElementById("height").value;
  let panele = document.forms["wybor"]["panele"].value;
  let wynik = document.getElementById("wynik");

  let pole = width * height;
  let zapanele = 0;

  if (panele == 1) {
    zapanele = 12;
  } else if (panele == 2) {
    zapanele = 14;
  } else {
    zapanele = 18;
  }

  let koszt = pole * zapanele;

  if (
    width == 0 ||
    height == 0 ||
    width === undefined ||
    height === undefined
  ) {
    wynik.innerHTML = "Wprowadź poprawne dane";
  } else {
    wynik.innerHTML =
      "Pole powierzchni pomieszczenia: " + pole + ", koszt montażu " + koszt;
  }
}
