console.log("henlooo");

function Nowy() {
  let nowy = document.createElement("article");
  let message = document.getElementById("mess").value;
  nowy.classList.add("jola");
  nowy.innerHTML = "<img src='./Jolka.jpg'><p>" + message + "</p>";
  chat.appendChild(nowy);
  chat.scrollTo(0, chat.scrollHeight);
}

let odpowiedzi = {
  1: "Świetnie!",
  2: "Kto gra główną rolę?",
  3: "Lubisz filmy Tego reżysera?",
  4: "Będę 10 minut wcześniej",
  5: "Może kupimy sobie popcorn?",
  6: "Ja wolę Colę",
  7: "Zaproszę jeszcze Grześka",
  8: "Tydzień temu też byłem w kinie na Diunie",
  9: "Ja funduję bilety",
};

function Generuj() {
  let numb = Math.floor(Math.random() * 9) + 1;

  let nowy = document.createElement("article");
  let message = odpowiedzi[numb];
  nowy.classList.add("krzys");
  nowy.innerHTML = "<img src='./Krzysiek.jpg'><p>" + message + "</p>";
  chat.appendChild(nowy);
  chat.scrollTo(0, chat.scrollHeight);
}
