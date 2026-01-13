<?php 
  header('refresh: 10; url=opony.php');

?>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styl.css" />
    <title>OPONY</title>
  </head>
  <body>
    <!--blok główny-->
    <main>
      <!--blok boczny-->
      <aside>
        <p>

        <?php 
          $conn = mysqli_connect("localhost", "root", "", "opony");
          $request1 = "SELECT * FROM `opony` ORDER BY `cena` ASC LIMIT 10;";
          $response1 = mysqli_query($conn, $request1);
          while($row1 = mysqli_fetch_array($response1)){

            $opona = "";

            if($row1['sezon'] == "letnia"){
              $opona = "<img src='./images/lato.png'>";
            }elseif ($row1['sezon'] == "zimowa"){
              $opona = "<img src='./images/zima.png'>";
            }else{
              $opona = "<img src='./images/uniwer.png'>";
            }

            echo "<article class='opona'>".$opona."
            <h4>Opona: ".$row1['producent']." ".$row1['model']."</h4>
            <h3>Cena: ".$row1['cena']."</h3>
            </article>";
          }
        ?>

        </p>
        <p><a href="https://opona.pl/">więcej ofert</a></p>
      </aside>

      <!--sekcja 1-->
      <section id="s1">
        <img src="./images/opona.png" alt="Opona" />
        <h2>Opona dnia</h2>
        <p>
          <?php 
            $request2 = "SELECT `producent`, `model`, `sezon`, `cena` FROM `opony` WHERE `nr_kat` = 9;";
            $response2 = mysqli_query($conn, $request2);
            while($row2 = mysqli_fetch_array($response2)){
              echo "<h2>".$row2['producent']." model ". $row2['model'] ."</h2>";
              echo "<h2>Sezon: ".$row2['sezon']."</h2>";
              echo "<h2>Tylko ".$row2['cena']." zł!</h2>";
            }
          ?>
        </p>
      </section>

      <!--sekcja 2-->
      <section id="s2">
        <h2>Najnowsze zamówienie</h2>
        <p>

        <?php
          $request3 = "SELECT `id_zam`, `ilosc`, opony.model, opony.cena FROM `zamowienie` INNER JOIN opony ON zamowienie.nr_kat = opony.nr_kat ORDER BY RAND() LIMIT 1;";
          $response3 = mysqli_query($conn, $request3);
          while($row3 = mysqli_fetch_array($response3)){
            echo "<h2>".$row3['id_zam']." ".$row3['ilosc']." sztuki modelu ".$row3['model']."</h2>";
            $wartość = $row3['ilosc'] * $row3['cena'];
            echo "<h2>Wartość zamówienia ".$wartość." zł</h2>";
          }

          mysqli_close($conn);
        ?>
        </p>
      </section>
    </main>

    <!--stopka-->
    <footer>Stronę wykonała: 
        <a href="https://pixelpick.pl/" target="_blank" style="color: rgb(151, 0, 98); text-decoration: none; font-weight: bolder;" >
            Szpileczka
        </a>
    </footer>
  </body>
</html>
