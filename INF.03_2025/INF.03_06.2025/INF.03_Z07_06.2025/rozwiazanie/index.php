<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styl.css" />
    <title>Biuro turystyczne</title>
  </head>
  <body>
    <!--Blok nawigacyjny-->
    <nav>
      <ul>
        <li><a href="./wczasy.html">Wczasy</a></li>
        <li><a href="./wycieczki.html">Wycieczki</a></li>
        <li><a href="./allinclusive.html">All inclusive</a></li>
      </ul>
    </nav>

    <!--Blok główny-->
    <main>
      <!--Blok boczny-->
      <aside>
        <h3>Twój cel wyprawy</h3>
        <form method="POST">
          <label for="miejsce">Miejsce wycieczki</label><br>
          <select name="miejsce">
            <?php 
              $conn = mysqli_connect("localhost", "root", "", "wyprawy");
              $request = "SELECT `nazwa` FROM `miejsca` ORDER BY (nazwa) DESC;";
              $response = mysqli_query($conn, $request);
              while($row = mysqli_fetch_array($response)){
                echo "<option value='".$row['nazwa']."'>".$row['nazwa']."</option>";
              }

            ?>
          </select>

          <label for="dorosli">Ile dorosłych?</label><br>
          <input name="dorosli" type="number" /><br>

          <label for="dzieci">Ile dzieci?</label><br>
          <input name="dzieci" type="number" /><br>

          <label for="termin">Termin</label><br>
          <input name="termin" type="date" /><br>

          <button type="submit">Symulacja ceny</button>
        </form>

        <?php

          $wynik = null;
          $wartosc = null;
        
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $dorosli = $_POST["dorosli"];
            $dzieci = $_POST["dzieci"];
            $termin = $_POST["termin"];
            $miejsce = $_POST["miejsce"];
            
            $request2 = "SELECT `cena` FROM `miejsca` WHERE `nazwa` = '".$miejsce."';";
            $response2 = mysqli_query($conn, $request2);
            while($row2 = mysqli_fetch_array($response2)){
              $cena = $row2['cena'];
            }

            if(isset($dorosli) && isset($dzieci) && isset($cena)){
            $ZaDoroslych = intval($dorosli) * $cena;
            $ZaDzieci = intval($dzieci) * ($cena / 2 );

            $cena = $ZaDoroslych + $ZaDzieci;

            $wynik = "W dniu: ". $termin;
            $wartosc = $cena." złotych";
          }

          }
        
        ?>

        <h4>Koszt wycieczki</h4>
        <p><?php echo $wynik ?></p>
        <p><?php echo $wartosc ?></p>
      </aside>

      <!--blok sekcji-->
      <section>
        <h3>Wycieczki</h3>
        <article>
          <?php 
              $conn = mysqli_connect("localhost", "root", "", "wyprawy");
              $request3 = "SELECT `nazwa`, `cena`, `link_obraz` FROM `miejsca` WHERE `link_obraz` LIKE '0%';";
              $response3 = mysqli_query($conn, $request3);
              while($row3 = mysqli_fetch_array($response3)){
                echo "<div class='wycieczka'>
                  <img src='./images/".$row3['link_obraz']."' alt='zdjęcie z wycieczki'>
                  <h2>".$row3["nazwa"]."</h2>
                  <p>".$row3["cena"]."</p>
                </div>";
              }

              mysqli_close($conn);
            ?>
        </article>
      </section>
    </main>

    <!--stopka-->
    <footer>
      <p>
        Autor:
        <a
          href="https://pixelpick.pl/"
          target="_blank"
          style="color: rgb(119, 1, 78); font-weight: bold"
          >Szpileczka</a
        >
      </p>
    </footer>
  </body>
</html>
