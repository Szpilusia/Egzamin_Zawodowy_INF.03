<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles.css" />
    <title>KOŁO SZACHOWE</title>
  </head>
  <body>
    <!--Blok nagłówkowy-->
    <header>
        <h2>Koło szachowe <em>gambit piona</em></h2>
    </header>

    <!--Blok lewy-->
    <aside>
        <h4>Polecane linki</h4>
        <ul>
            <li>
                <a href="/screenshots/kw1.png">kwerenda1</a>
            </li>
            <li>
                <a href="/screenshots/kw2.png">kwerenda2</a>
            </li>
            <li>
                <a href="/screenshots/kw3.png">kwerenda3</a>
            </li>
            <li>
                <a href="/screenshots/kw4.png">kwerenda4</a>
            </li>
        </ul>
        <img src="./logo.png" alt="Logo koła">
    </aside>

    <!--Blok prawy-->
    <section>
        <h3>Najlepsi gracze naszego koła</h3>

        <table>
            <tr>
                <th>Pozycja</th>
                <th>Pseudonim</th>
                <th>Tytuł</th>
                <th>Ranking</th>
                <th>Klasa</th>
            </tr>
            <?php 
                $conn = mysqli_connect("localhost", "root", "", "szachy");
                $request1 = "SELECT `pseudonim`, `tytul`, `ranking`, `klasa` FROM `zawodnicy` WHERE `ranking` > 2787 ORDER BY ranking DESC;";
                $response1 = mysqli_query($conn, $request1);
                $pozycja = 1;
                while($row = mysqli_fetch_array($response1)){
                    echo "<tr>
                        <td>".$pozycja."</td>
                        <td>".$row['pseudonim']."</td>
                        <td>".$row['tytul']."</td>
                        <td>".$row['ranking']."</td>
                        <td>".$row['klasa']."</td>
                    </tr>";
                    $pozycja ++;
                }
            ?>
        </table>

        <form methd="POST">
            <button>Losuj nową parę graczy</button>
        </form>

        <?php 
            $request2 = "SELECT `pseudonim`, `klasa` FROM zawodnicy ORDER BY RAND() LIMIT 2;";
            $response2 = mysqli_query($conn, $request2);
            echo "<h4>";
                while($przeciwnicy = mysqli_fetch_array($response2)){
                    echo $przeciwnicy['pseudonim']." ".$przeciwnicy['klasa']." ";
                }
            echo "</h4>";
            mysqli_close($conn);
        ?>
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </section>

    <!--Blok stopki-->
    <footer>Stronę wykonała: <a href="https://pixelpick.pl/" target="_blank" style="color: rgb(214, 0, 125);">Szpileczka</a></footer>

  </body>
</html>
