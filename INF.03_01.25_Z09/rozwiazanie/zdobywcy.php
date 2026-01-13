<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ZDOBYWCY GÓR</title>
    <link rel="stylesheet" href="./styles.css" />
  </head>
  <body>
    <!--Bloczek nagłówkowy-->
    <header>
      <h1>Klub zdobywców gór polskich</h1>
    </header>

    <!--Blok nawigacyjny-->
    <nav>
      <a href="/screenshots/kw1.png">Kwerenda1 </a>
      <a href="/screenshots/kw2.png">Kwerenda2 </a>
      <a href="/screenshots/kw3.png">Kwerenda3 </a>
      <a href="/screenshots/kw4.png">Kwerenda4 </a>
    </nav>

    <!--Blok lewy-->
    <aside>
      <img src="./logo.png" alt="logo zdobywcy" />
      <h3>Razem z nami:</h3>
      <ul>
        <li>wyjazdy</li>
        <li>szkolenia</li>
        <li>rekreacja</li>
        <li>wypoczynek</li>
        <li>wyzwania</li>
      </ul>
    </aside>

    <!--Blok prawy-->
    <section>
      <h2>Dołącz do naszego zespołu!</h2>
      <p>Wpisz swoje dane do formularza:</p>

      <form method="POST">
        <label for="nazwisko">Nazwisko</label>
        <input type="text" name="nazwisko" />

        <label for="imie">Imię</label>
        <input type="text" name="imie" />

        <label for="funkcja">Funkcja</label>
        <select name="funkcja">
          <option value="uczestnik">uczestnik</option>
          <option value="przewodnik">przewodnik</option>
          <option value="zaopatrzeniowiec">zaopatrzeniowiec</option>
          <option value="organizator">organizator</option>
          <option value="ratownik">ratownik</option>
        </select>

        <label for="email">Email</label>
        <input type="email" name="email" />

        <button type="submit">Dodaj</button>
      </form>

      <!--skrypt 2-->
      <?php 
        $conn = mysqli_connect("localhost", "root", "", "zdobywcy");

        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $nazwisko = $_POST['nazwisko'];
          $imie = $_POST['imie'];
          $funkcja = $_POST['funkcja'];
          $email = $_POST['email'];
          
          $request1 = "INSERT INTO `osoby` (`id_osoby`, `nazwisko`, `imie`, `funkcja`, `email`) VALUES (NULL, '".$nazwisko."', '".$imie."', '".$funkcja."', '".$email."');";

          $response = mysqli_query($conn, $request1);
          if($response == "Success"){
            echo "New record created successfully :)";
          }else{
            echo "Smth wrong....";
          }
        }

        
      ?>


      <table>
        <tr>
          <th>Nazwisko</th>
          <th>Imię</th>
          <th>Funkcja</th>
          <th>Email</th>
        </tr>
        <!--skrypt 1-->
        <?php
        
        $request2 = "SELECT `nazwisko`, `imie`, `funkcja`, `email` FROM `osoby`;";
        $response2 = mysqli_query($conn, $request2);

        while($row = mysqli_fetch_array($response2)){
          echo "<tr>
            <td>".$row['nazwisko']."</td>
            <td>".$row['imie']."</td>
            <td>".$row['funkcja']."</td>
            <td>".$row['email']."</td>
          </tr>";
        }

        ?>
      </table>
    </section>

    <!--Stopki-->
    <footer>
      <p>
        Stronę wykonała:
        <a
          href="https://pixelpick.pl/"
          target="_blank"
          style="color: rgb(152, 0, 91)"
          >Szpileczka</a
        >
      </p>
    </footer>
  </body>
</html>
