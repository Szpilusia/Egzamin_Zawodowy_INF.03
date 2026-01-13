function Liczymy() {
  let file = document.getElementById("file").value;
  let ilosc = document.getElementById("ilosc").value;
  let papier = document.querySelector('input[name="papier"]:checked').value;

  let a = 0;
  if (papier == "blyszczacy") {
    a = 1.5;
  } else {
    a = 2;
  }

  let cena = ilosc * a;

  let obraz = file.replace("C:\\fakepath\\", "./obrazy/");
  console.log(obraz);
  let miejsce = document.getElementById("skrypcik");
  let elem = document.createElement("div");

  elem.innerHTML =  "<img src='" + obraz + "'><p>Liczba kopii: " +  ilosc +  " </p><p>Cena:  " + cena + " </p>";

  miejsce.appendChild(elem);
}
