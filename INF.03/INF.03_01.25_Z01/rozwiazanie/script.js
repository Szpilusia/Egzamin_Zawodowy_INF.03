function Obliczanie() {
  let react = document.getElementById("react").checked;
  let js = document.getElementById("js").checked;
  let raty = document.getElementById("raty").value;
  let miasto = document.getElementById("miasto").value;
  let wynik = document.getElementById("wynik");

  let kwota = 0;

  if (react == true && js == true) {
    kwota = 8000;
  } else if (react == true && js == false) {
    kwota = 5000;
  } else if (js == true && react == false) {
    kwota = 3000;
  } else {
    kwota = 0;
  }

  let liczba;

  if (raty == 0) {
    liczba = 1;
  } else {
    liczba = raty;
  }

  let rata = Math.round(kwota / liczba);

  if (kwota == 0) {
    wynik.innerHTML = "Wybierz jakiś kurs";
  } else {
    wynik.innerHTML =
      "Kurs odbędzie się w " +
      miasto +
      ". Koszt całkowity: " +
      kwota +
      " zł. Płacisz " +
      liczba +
      " rat po " +
      rata +
      " zł";
  }
}
