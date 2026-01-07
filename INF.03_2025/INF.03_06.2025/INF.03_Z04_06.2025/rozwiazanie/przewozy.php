<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles.css" />
    <title>Firma Przewozowa</title>
  </head>
  <body>
    <!--blok nagłówkowy-->
    <header>
      <h1>Firma przewozowa Półdarmo</h1>
    </header>

    <!--blok nawigacyjny-->
    <nav>
      <a href="/screenshots/kw1.png">kwerenda1</a>
      <a href="/screenshots/kw2.png">kwerenda2</a>
      <a href="/screenshots/kw3.png">kwerenda3</a>
      <a href="/screenshots/kw4.png">kwerenda4</a>
    </nav>

    <!--blok główny-->
    <main>
      <!--sekcaj lewa-->
      <article>
        <h2>Zadania do wykonania</h2>

        <table>
          <tr>
            <th>Zadanie do wykonania</th>
            <th>Data realizacj</th>
            <th>Akcja</th>
          </tr>

          <?php
            $conn = mysqli_connect("localhost", "root", "", "przewozy");

            $request1 = "SELECT `id_zadania`,`zadanie`,`data` FROM `zadania`;";
            $response1 = mysqli_query($conn, $request1);
            While($row = mysqli_fetch_array($response1)){
              echo "<tr>
                <td>".$row['zadanie']."</td>
                <td>".$row['data']."</td>
                <td><a href='przewozy.php?id_zadania={$row['id_zadania']}'>Usuń</a></td>
              </tr>";
            }

            if (isset($_GET["id_zadania"])) {
              $id = $_GET["id_zadania"];
              $request2 = "DELETE FROM zadania WHERE id_zadania = $id;";
              mysqli_query($conn, $request2);
              header("location: przewozy.php");
            }
          ?>

        </table>

        <form method="POST">
          <label for="zadanie">Zadanie do wykonania: </label>
          <input name="zadanie" type="text" /><br />

          <label for="data">Data realizacji: </label>
          <input name="data" type="date" />

          <button type="submit">Dodaj</button>
        </form>
      </article>

      <?php

        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $zadanie = $_POST["zadanie"];
          $data = $_POST["data"];

          if(!empty($data) && !empty($zadanie)){
            $request = "INSERT INTO `zadania`(`id_zadania`, `zadanie`, `data`, `osoba_id`) VALUES ('NOT NULL','".$zadanie."','".$data."','1');";
            $dodanie = mysqli_query($conn, $request);
            header("location: przewozy.php");
          }

        }

        mysqli_close($conn);
      ?>

      <!--sekcaj prawa-->
      <section>
        <img src="./auto.png" alt="auto firmowe" />
        <h3>Nasza specjalność</h3>
        <ul>
          <li>Przeprowadzki</li>
          <li>Przewóz mebli</li>
          <li>Przesyłki gabarytowe</li>
          <li>Wynajem pojazdów</li>
          <li>Zakupy towarów</li>
        </ul>
      </section>
    </main>

    <!--stopka-->
    <footer>
      <p>
        Stronę wykonała:
        <a
          href="https://pixelpick.pl/"
          target="_blank"
          style="color: rgb(114, 1, 67)"
          >Szpileczka
        </a>
      </p>
    </footer>
  </body>
</html>
