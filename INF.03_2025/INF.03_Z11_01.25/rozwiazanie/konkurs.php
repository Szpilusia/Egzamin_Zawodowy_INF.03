<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles.css" />
    <title>WOLONTARIAT SZKOLNY</title>
  </head>
  <body>
    <!--Blok nagłówkowy-->
    <header>
      <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>

    <!--Blok lewy-->
    <section>
      <h3>Konkursowe nagrody</h3>
      <button onclick="location.reload()">Losuj nowe nagrody</button>
      <table>
        <tr>
          <th>Nr</th>
          <th>Nazwa</th>
          <th>Opis</th>
          <th>Wartość</th>
        </tr>
        <?php 
          $conn = mysqli_connect("localhost", "root", "", "konkurs");
          $request = "SELECT `nazwa`, `opis`, `cena` FROM `nagrody` ORDER BY RAND() LIMIT 5;";
          $response = mysqli_query($conn, $request);
          $number = 1;
          while($row = mysqli_fetch_array($response)){
            if($number % 2 == 0){
                echo "<tr>
                  <td>".$number."</td>
                  <td>".$row['nazwa']."</td>
                  <td>".$row['opis']."</td>
                  <td>".$row['cena']."</td>
                </tr>";

                $number ++;
            }else{
              echo "<tr class='parzyste'>
                  <td>".$number."</td>
                  <td>".$row['nazwa']."</td>
                  <td>".$row['opis']."</td>
                  <td>".$row['cena']."</td>
                </tr>";

                $number ++;
            }
          }
          mysqli_close($conn);
        ?>
      </table>
    </section>

    <!--Blok prawy-->
    <aside>
      <img src="./puchar.png" alt="Puchar dla wolontariusza" />
      <h4>Polecane linki</h4>
      <ul>
        <li>
          <a href="/screenshots/kw1.png">Kwerenda1</a>
        </li>
        <li>
          <a href="/screenshots/kw2.png">Kwerenda2</a>
        </li>
        <li>
          <a href="/screenshots/kw3.png">Kwerenda3</a>
        </li>
        <li>
          <a href="/screenshots/kw4.png">Kwerenda4</a>
        </li>
      </ul>
    </aside>

    <!--Blok stopki-->
    <footer>
      <p>
        Numer zdającego:
        <a
          href="./https://pixelpick.pl/"
          target="_blank"
          style="color: rgb(154, 0, 90)"
          >Szpileczka</a
        >
      </p>
    </footer>
  </body>
</html>
