<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Obuwie</title>
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <!--blok nagłówkowy-->
    <header>
      <h1>Obuwie męskie</h1>
    </header>

    <!--Blok główny-->
    <main>
      <form action="zamow.php" method="POST">
        <label for="model">Model: </label>
        <select name="model" class="kontrolki">
            <!--skrypcik 1-->
            <?php
              $conn = new mysqli("localhost", "root", "", "obuwie");
              $request1 = "SELECT `model` FROM `produkt`;";
              $response = mysqli_query($conn, $request1);
              while($row = mysqli_fetch_array($response)){
                echo "<option value='".$row['model']."'>".$row['model']."</option>";
              }
            ?>
        </select>

        <label for="rozmiar">Rozmiar: </label>
        <select name="rozmiar" class="kontrolki">
          <option value="40">40</option>
          <option value="41">41</option>
          <option value="42">42</option>
          <option value="43">43</option>
        </select>

        <label for="pary">Liczba par: </label>
        <input type="number" name="pary" class="kontrolki" min="1" value="1"/>

        <button type="submit" class="kontrolki">Zamów</button>
      </form>

      <article>
        <!--skrypcik 2-->
        <?php 
          $request2 = "SELECT buty.model, buty.nazwa, buty.cena, produkt.nazwa_pliku FROM `buty` INNER JOIN produkt ON buty.model = produkt.model;";
          $response2 = mysqli_query($conn, $request2);
          while($row2 = mysqli_fetch_array($response2)){
            echo "<article class='buty'>
              <img src='./".$row2['nazwa_pliku']."' alt='but męski'>
              <h2>".$row2['nazwa']."</h2>
              <h5>Model: ".$row2['model']."</h5>
              <h4>Cena: ".$row2['cena']."</h4>
            </article>";
          }

          mysqli_close($conn);
        ?>
      </article>
    </main>

    <!--Stopka-->
    <footer>
      <p>
        Autor strony:
        <a
          href="https://pixelpick.pl/"
          target="_blank"
          style="color: rgb(129, 1, 77)"
          >Szpileczka</a
        >
      </p>
    </footer>
  </body>
</html>
