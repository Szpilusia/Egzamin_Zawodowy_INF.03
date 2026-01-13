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
        <h2>Zamówienie</h2>
        <article>
          <!--skrypcik 3-->
          <?php 
           $conn = new mysqli("localhost", "root", "", "obuwie");
           $model = $_POST['model'];
           $rozmiar = $_POST['rozmiar'];
           $pary = $_POST['pary'];

           $request3 = "SELECT buty.nazwa, buty.cena, produkt.kolor, produkt.kod_produktu, produkt.material, produkt.nazwa_pliku FROM `buty` INNER JOIN produkt ON buty.model = produkt.model WHERE buty.model = '".$model."';";
           $response3 = mysqli_query($conn, $request3);
           while($row3 = mysqli_fetch_array($response3)){
            echo "
            <img src='./".$row3['nazwa_pliku']."'>
            <h2>".$row3['nazwa']."</h2>
            <p>cena za ".$pary." par: ". $pary * $row3['cena']." zł</p>
            <p>Szczegóły produktu: ".$row3['kolor'].", ".$row3['material']."</p>
            <p>Rozmiar: ".$rozmiar."</p>
            ";

           }

           mysqli_close($conn);
          ?>
        </article>
        <a href="./index.php">Strona główna</a>
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