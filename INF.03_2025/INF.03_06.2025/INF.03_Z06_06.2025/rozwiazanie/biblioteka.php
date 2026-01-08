<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styl.css" />
    <title>Biblioteka miejska</title>
  </head>
  <body>
    <!--blok nagłówka-->
    <header>
      <?php
        for($i = 1; $i <= 20; $i++){
          echo "<img src='./obraz.png' alt='obraz ksiazek'>";
        }
      ?>
    </header>

    <!--blok sekcji 1-->
    <section id="s1">
      <h2>Liryka</h2>

      <form method="POST">
        <select name="liryka">
          <?php 
            $wynik = "";
            $conn = mysqli_connect("localhost", "root", "", "biblioteka");
            $l = "SELECT `id`,`tytul` FROM `ksiazka` WHERE `gatunek` = 'liryka';";
            $liryka = mysqli_query($conn, $l);
            while($lrow = mysqli_fetch_array($liryka)){
              echo "<option value='".$lrow['id']."'>".$lrow['tytul']."</option>";
            }

          ?>
        </select>
        <button type="submit">Rezerwuj</button>
      </form>

      <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          
          $id = null;

          if (isset($_POST["liryka"])) {
            $id = $_POST["liryka"];
          }
          if (isset($_POST["epika"])) {
              $id = $_POST["epika"];
          }
          if (isset($_POST["dramat"])) {
            $id = $_POST["dramat"];
          }

            $request = "SELECT `tytul` FROM `ksiazka` WHERE `id` = ". $id .";";
            $reservation = "UPDATE `ksiazka` SET `Rezerwacja`= 1 WHERE `id` = ". $id .";";
            $response = mysqli_query($conn, $request);
            mysqli_query($conn, $reservation);


            while($tytulik = mysqli_fetch_array($response)){
              $wynik = "Książka ". $tytulik['tytul'] ." została zarezerwowana";
            }
        }
      ?>

      <p>
        <?php echo $wynik; ?>
      </p>
    </section>

    

    <!--blok sekcji 2-->
    <section id="s2">
      <h2>Epika</h2>

      <form method="POST">
        <select name="epika">
          <?php 
            $e = "SELECT `id`,`tytul` FROM `ksiazka` WHERE `gatunek` = 'epika';";
            $epika = mysqli_query($conn, $e);
            while($erow = mysqli_fetch_array($epika)){
              echo "<option value='".$erow['id']."'>".$erow['tytul']."</option>";
            }
          ?>
        </select>
        <button type="submit">Rezerwuj</button>
      </form>
    </section>

    <!--blok sekcji 3-->
    <section id="s3">
      <h2>Dramat</h2>

      <form method="POST">
        <select name="dramat">
          <?php 
            $d = "SELECT `id`,`tytul` FROM `ksiazka` WHERE `gatunek` = 'dramat';";
            $dramat = mysqli_query($conn, $d);
            while($drow = mysqli_fetch_array($dramat)){
              echo "<option value='".$drow['id']."'>".$drow['tytul']."</option>";
            }
          ?>
        </select>
        <button type="submit">Rezerwuj</button>
      </form>
    </section>

    <!--blok sekcji 4-->
    <section id="s4">
        <h2>Zaległe książki</h2>
        <ul>
          <?php 
            $list = "SELECT `tytul`, `id`, `id_cz`, `data_odd` FROM `ksiazka` INNER JOIN wypozyczenia ON ksiazka.id = wypozyczenia.id_ks ORDER BY wypozyczenia.data_odd ASC LIMIT 15;";
            $response = mysqli_query($conn, $list);
            while($row = mysqli_fetch_array($response)){
              echo "<li>".$row['tytul']." ".$row['id']."".$row['id_cz']." ".$row['data_odd']."</li>";
            }

            mysqli_close($conn);
          ?>
        </ul>
    </section>

    <!--stopka-->
    <footer>
        <p>Autor: <b><a href="https://pixelpick.pl/" target="_blank" style="color: rgb(116, 0, 77);">Szpileczka</a></b></p>
    </footer>
  </body>
</html>
