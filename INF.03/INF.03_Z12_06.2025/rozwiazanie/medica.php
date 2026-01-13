<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styl.css" />
    <link rel="icon" href="./images/obraz2.png" />
    <title>Przychodnia Medica</title>
  </head>
  <body>
    <!--Blok nagłówkowy-->
    <header>
      <h1>Abonamenty w przychodni Medica</h1>
    </header>

    <!--Blok artykułu-->
    <article>
        <p>
          <?php 
            $conn = mysqli_connect("localhost", "root", "", "medica");
            $sql = "SELECT `nazwa`, `cena`, `opis` FROM `abonamenty`;";
            $request = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($request)){
              echo "
                <h3>Pakiet ".$row['nazwa']." - cena ".$row['cena']." zł</h3>
                <p>".$row['opis']."</p>
              ";
            }
          ?>
        </p>
        <a href="./opis.html">Dowiedz się więcej</a>
    </article>

    <!--Blok główny-->
    <main>
      <section id="s1">
        <h2>Standardowy</h2>
        <ul>
          <?php 
            $sql1 = "SELECT nazwa, cecha FROM abonamenty INNER JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id INNER JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 1;";
            $request1 = mysqli_query($conn, $sql1);
            while($row1 = mysqli_fetch_array($request1)){
              echo "<li>".$row1["cecha"]."</li>";
            }
          ?>
        </ul>
      </section>

      <section id="s2">
        <h2>Premium</h2>
        <ul>
          <?php 
            $sql2 = "SELECT nazwa, cecha FROM abonamenty INNER JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id INNER JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 2;";
            $request2 = mysqli_query($conn, $sql2);
            while($row2 = mysqli_fetch_array($request2)){
              echo "<li>".$row2["cecha"]."</li>";
            }
          ?>
        </ul>
      </section>

      <section id="s3">
        <h2>Dziecko</h2>
        <ul>
          <?php 
            $sql3 = "SELECT nazwa, cecha FROM abonamenty INNER JOIN szczegolyabonamentu ON abonamenty.id = Abonamenty_id INNER JOIN cechy ON cechy.id = Cechy_id WHERE abonamenty.id = 3;";
            $request3 = mysqli_query($conn, $sql3);
            while($row3 = mysqli_fetch_array($request3)){
              echo "<li>".$row3["cecha"]."</li>";
            }

            mysqli_close($conn);
          ?>
        </ul>
      </section>
    </main>

    <!--Blok stopki-->
    <footer>
        <p>
            <img src="./images/obraz2.png" alt="przychodnia">
            Stronę przygotowała: 
            <a href="https://pixelpick.pl/" target="_blank" style="color: rgb(130, 0, 80); text-decoration: none; font-weight: bolder;">Szpileczka</a>
        </p>
    </footer>
  </body>
</html>
