function liczenie() {
  let L = document.getElementById("liczba").value;
  let wynik = document.getElementById("wynik");

  if (L === "" || isNaN(L)) {
    wynik.innerHTML = "Podaj liczbę";
  }

  let liczba = Math.floor(Math.abs(Number(L)));

  if (liczba === 0) {
    wynik.innerHTML = "0 <sub>(2)</sub>";
  }

  let binarka = "";
  while (liczba > 0) {
    binarka = (liczba % 2) + binarka;
    liczba = Math.floor(liczba / 2);

    console.log(binarka);
    console.log(liczba);
  }

  let grupowanie = "";
  for (let i = binarka.length; i > 0; i -= 4) {
    let start = Math.max(i - 4, 0);
    let grupa = binarka.substring(start, i);
    if (grupowanie !== "") {
      grupowanie = grupa + " " + grupowanie;
    } else {
      grupowanie = grupa;
    }
    console.log(grupowanie);
  }

  wynik.innerHTML = grupowanie + " <sub>(2)</sub>";
}
