<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styl.css" />
    <title>Szkolenia i kursy</title>
  </head>
  <body>
    <!--Blok nagłówkowy-->
    <header>
      <h1>SZKOLENIA</h1>
    </header>

    <!--Blok główny-->
    <main>
      <section>
        <table>
          <tr>
            <th>Kurs</th>
            <th>Nazwa</th>
            <th>Cena</th>
          </tr>
          <?php 
            $conn = mysqli_connect("localhost", "root", "", "szkolenia");
            $kursy = "SELECT `kod`, `nazwa`,`cena` FROM `kursy` ORDER BY `cena` ASC;";
            $rodzaje = mysqli_query($conn, $kursy);
            while($wyniki = mysqli_fetch_array($rodzaje)){
              echo "<tr>
              <td><img src='./images/".$wyniki['kod'].".jpg'></td>
              <td>".$wyniki['nazwa']."</td>
              <td>".$wyniki['cena']."</td>
              </tr>";
            }
          ?>
        </table>
      </section>

      <article>
        <h2>Zapisy na kursy</h2>
        <form method="POST">
          <label for="imie">Imię</label><br />
          <input type="text" name="imie" /><br />

          <label for="nazwisko">Nazwisko</label><br />
          <input type="text" name="nazwisko" /><br />

          <label for="wiek">Wiek</label><br />
          <input type="number" name="wiek" /><br />

          <label for="kurs">Rodzaj kursu</label><br />
          <select type="text" name="kurs">
            <?php 
            $choose = "SELECT `nazwa` FROM `kursy`";
            $response = mysqli_query($conn, $choose );
            while($row = mysqli_fetch_array($response)){
              echo "<option value='".$row['nazwa']."'>".$row['nazwa']."</option>";
            }
          ?>
          </select>
          <br />

          <button type="submit">Dodaj dane</button>
        </form>

         <?php
          $wynik = null;

          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $wiek = $_POST['wiek'];
            $kurs = $_POST['kurs'];

            if(!empty($imie) && !empty($nazwisko) && !empty($wiek) && !empty($kurs)){
            $add = "INSERT INTO `uczestnicy`(`id_uczestnika`, `imie`, `nazwisko`, `wiek`) VALUES (NULL, '".$imie."', '".$nazwisko."', ".$wiek.");";
            $added = mysqli_query($conn, $add );
            $wynik = "Dane uczestnika ".$imie." ".$nazwisko." zostały dodane";
            }else{
              $wynik = "Wprowadź wszystkie dane";
            }
          }
        ?>

        <p> <?php echo $wynik; ?></p>
      </article>
    </main>

   
    

    <!--Blok stopki-->
    <footer>
      <p>
        Stronę wykonała:
        <a href="https://pixelpick.pl/" target="_blank"> Szpileczka </a>
      </p>
    </footer>
  </body>
</html>
