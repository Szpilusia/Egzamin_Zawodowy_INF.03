let liczba = 6;

function Dodaj() {
  liczba++;
  let zadanie = document.getElementById("zadanie").value;
  let task = document.createElement("li");
  let list = document.getElementById("list");

  task.id = liczba;
  task.innerHTML = zadanie + "<button onClick='Wykonano(this)'>Wykonano</button>";

  list.appendChild(task);
}

function Wykonano(button) {
  let task = button.parentElement;
  task.style.textDecoration = "line-through";
}
