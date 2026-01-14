function Tab(num) {
  console.log(num);

  if (num == 1) {
    document.getElementById("s1").style.display = "block";
    document.getElementById("s2").style.display = "none";
    document.getElementById("s3").style.display = "none";
  } else if (num == 2) {
    document.getElementById("s2").style.display = "block";
    document.getElementById("s1").style.display = "none";
    document.getElementById("s3").style.display = "none";
  } else {
    document.getElementById("s3").style.display = "block";
    document.getElementById("s2").style.display = "none";
    document.getElementById("s1").style.display = "none";
  }
}

let ilosc = 4;

function Dodawanie() {
  if (ilosc < 100) {
    ilosc = ilosc + 12;
    document.getElementById("postep").style.width = `${ilosc}` + "%";
  }
}

function Dane() {
  let imie = document.getElementById("imie").value;
  let nazwisko = document.getElementById("nazwisko").value;
  let urodzenie = document.getElementById("urodzenie").value;
  let ulica = document.getElementById("ulica").value;
  let numer = document.getElementById("dom").value;
  let miasto = document.getElementById("miasto").value;
  let telefon = document.getElementById("tel").value;
  let rodo = document.getElementById("rodo").checked;

  console.log(imie, nazwisko, urodzenie, ulica, numer, miasto, telefon, rodo);
}
