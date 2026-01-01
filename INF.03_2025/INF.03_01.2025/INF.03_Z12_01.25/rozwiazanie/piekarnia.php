<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles.css" />
    <title>PIEKARNIA</title>
  </head>
  <body>
    <img src="./wypieki.png" alt="Produkty naszej piekarni" />

    <!--navigacja-->
    <nav>
      <a href="/screenshots/kw1.png">KWERENDA1</a>
      <a href="/screenshots/kw2.png">KWERENDA2</a>
      <a href="/screenshots/kw3.png">KWERENDA3</a>
      <a href="/screenshots/kw4.png">KWERENDA4</a>
    </nav>

    <!--nagłówek-->
    <header>
      <h1>WITAMY</h1>
      <h4>NA STRONIE PIEKARNI</h4>
      <p>
        Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże,
        naturalnie smaczne. Pieczemy wyłącznie wypieki na naturalnym zakwasie
        bez polepszaczy i zagęstników. Korzystamy wyłącznie z najlepszych ziaren
        pochodzących z ekologicznych upraw położonych w rejonach zgierskim i
        ozorkowskim.
      </p>
    </header>

    <!--blok główny-->
    <main>
      <h4>Wybierz rodzaj wypieków:</h4>
      <form method="POST">
        <select name="wyroby">
          <?php 
            $conn = mysqli_connect("localhost", "root", "", "wyroby");
            $request1 = "SELECT DISTINCT `Rodzaj` FROM `wyroby` ORDER BY `Rodzaj` DESC;";
            $response1 = mysqli_query($conn, $request1);
            while($row1 = mysqli_fetch_array($response1)){
              echo "<option value='".$row1['Rodzaj']."'>".$row1['Rodzaj']."</option>";
            }
          ?>
        </select>
        <button type="submit">Wybierz</button>
      </form>
      <table>
        <tr>
          <th>Rodzaj</th>
          <th>Nazwa</th>
          <th>Gramatura</th>
          <th>Cena</th>
        </tr>
        <?php 

          if($_SERVER["REQUEST_METHOD"] == "POST"){

            $wyroby = $_POST['wyroby'];
            $request2 = "SELECT `Rodzaj`,`Nazwa`,`Gramatura`,`Cena` FROM `wyroby` WHERE `Rodzaj` = '".$wyroby."';";
            $response2 = mysqli_query($conn, $request2);
            while($row2 = mysqli_fetch_array($response2)){
              echo"<tr>
                <td>".$row2['Rodzaj']."</td>
                <td>".$row2['Nazwa']."</td>
                <td>".$row2['Gramatura']."</td>
                <td>".$row2['Cena']."</td>
              </tr>";
            }

          }

          Mysqli_close($conn);
          ?>
      </table>
    </main>

    <!--stopka-->
    <footer>
      <p>
        AUTOR:
        <a
          href="https://pixelpick.pl/"
          target="_blank"
          style="color: rgba(241, 4, 174, 1); margin: 0px; padding: 0px;"
          >Szpileczka</a
        >
      </p>
      <p>Data: 01.01.2026</p>
    </footer>
  </body>
</html>
