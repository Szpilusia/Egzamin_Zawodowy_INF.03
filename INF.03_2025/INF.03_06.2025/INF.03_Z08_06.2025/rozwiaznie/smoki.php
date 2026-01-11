<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styl.css" />
    <title>Smoki</title>
  </head>
  <body>
    <!--Blok nagłówkowy-->
    <header>
      <h2>Poznaj smoki!</h2>
    </header>

    <!--Blok nawigacyjny-->
    <nav>
      <!--Bloki artykułów-->
      <article id="b1" onClick="Open(1)">Baza</article>
      <article id="b2" onClick="Open(2)">Opisy</article>
      <article id="b3" onClick="Open(3)">Galeria</article>
    </nav>

    <!--Blok główny-->
    <main>
      <!--Bloki sekcji-->
      <section id="s1">
        <h3>Baza Smoków</h3>
        <form method="POST">
          <select name="kraj">
            <?php 
              $conn = mysqli_connect("localhost" ,"root", "", "smoki");
              $request = "SELECT DISTINCT `pochodzenie` FROM `smok` ORDER BY `pochodzenie` DESC;";
              $response = mysqli_query($conn, $request);
              while($row = mysqli_fetch_array($response)){
                echo "<option value='".$row['pochodzenie']."'>".$row['pochodzenie']."</option>";
              }
            ?>
          </select>
          <button type="submit">Szukaj</button>
        </form>

        <table>
          <tr>
            <th>Nazwa</th>
            <th>Długość</th>
            <th>Szerokość</th>
          </tr>
          <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
              $kraj = $_POST['kraj'];
              $request2 = "SELECT `nazwa`, `dlugosc`, `szerokosc` FROM `smok` WHERE `pochodzenie` = '".$kraj."';";
              $response2 = mysqli_query($conn, $request2);
              while($wyniki = mysqli_fetch_array($response2)){
                echo "<tr>
                  <td>".$wyniki['nazwa']."</td>
                  <td>".$wyniki['dlugosc']."</td>
                  <td>".$wyniki['szerokosc']."</td>
                </tr>";
              }

            }

            mysqli_close($conn);
          ?>
        </table>
        
      </section>

      <section id="s2">
        <h3>Opisy smoków</h3>
        <dl>
          <dt>Smok czerwony</dt>
          <dd>
            Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami.
            Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw.
            Jest dziki i groźny.
          </dd>

          <dt>Smok zielony</dt>
          <dd>
            Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami,
            ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej
            przez niego, tka się najdroższe materiały.
          </dd>

          <dt>Smok niebieski</dt>
          <dd>
            Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest
            natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten
            jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i
            nie lubi się przepracowywać.
          </dd>
        </dl>
      </section>

      <section id="s3">
        <h3>Galeria</h3>
        <img src="./images/smok1.jpg" alt="Smok czerwony" />
        <img src="./images/smok2.jpg" alt="Smok zielony" />
        <img src="./images/smok3.jpg" alt="Smok niebieski" />
      </section>
    </main>

    <!--Blok stopki-->
    <footer>
      <p>
        Stornę opracowała:
        <a
          href="https://pixelpick.pl/"
          target="_blank"
          style="color: rgb(124, 0, 89); font-weight: bold"
        >Szpileczka
        </a>
      </p>
    </footer>

    <script src="./script.js"></script>
  </body>
</html>
