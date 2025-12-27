<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="icon" href="./fav.png" />
    <title>Wyszukiwarka miast</title>
  </head>
  <body>
    <!--kontener zawartości-->
    <main>
      <!--blok nagłówkowy-->
      <header>
        <img src="./baner.jpg" alt="Polska" />
      </header>

        <!--1 blok lewy ,,górny"-->
        <aside>
          <h4>Podaj początek nazwy miasta</h4>
          <form method="POST">
            <input type="text" name="filtr"/>
            <button type="submit">Szukaj</button>
          </form>
        </aside>

      <!--blok prawy-->
      <section>
        <h1>Wyniki wyszukiwania miast z uwzględnieniem filtra:</h1>
        <?php
          
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $filtr = $_POST['filtr'];
            
            if(isset($filtr) == TRUE && is_numeric($filtr) == FALSE){
            $conn = mysqli_connect("localhost", "root", "", "wykaz");
            // PHP nie lubi kropek '.' w nazwach więc dokładam as... :)
            $request = "SELECT miasta.nazwa as 'miasta', wojewodztwa.nazwa as 'wojewodztwa' FROM `miasta` INNER JOIN wojewodztwa ON wojewodztwa.id = miasta.id_wojewodztwa WHERE miasta.nazwa LIKE '". $filtr ."%' ORDER BY `miasta`.`nazwa`;";
            $response = mysqli_query($conn, $request);
            echo "
            <p id='tekstFiltra'>".$filtr."</p>
            <table>
            <tr>
              <th>Miasto</th>
              <th>Województwo</th>
            </tr>";
            while($row = mysqli_fetch_array($response)){
              echo "
                <tr>
                  <td>".$row['miasta']."</td>
                  <td>".$row['wojewodztwa']."</td>
                </tr>
              ";
            }
            echo "</table>";

            mysqli_close($conn);
          }else{
            echo "<p id='tekstFiltra'>Podaj jakiś początek</p>";
          }
          }
        ?>
      </section>

      <!--2 blok lewy ,,dolny"-->
        <article>
          <p>Egzamin INF.03</p>
          <p>
            Autor:
            <a
              href="https://pixelpick.pl/"
              target="_blank"
              style="color: rgb(205, 6, 135)"
              >Szpileczka</a
            >
          </p>
        </article>
    </main>
  </body>
</html>
