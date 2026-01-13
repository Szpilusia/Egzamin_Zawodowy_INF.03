<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./fav.png" />
    <link rel="stylesheet" href="./style.css" />
    <title>Mieszalnia farb</title>
  </head>
  <body>
    <!--blok nagłówkowy-->
    <header>
      <img src="./baner.png" alt="Mieszalnia farb" />
    </header>

    <!--Formularz-->
    <form method="POST">
      <label for="od">Data odbiory od: </label>
      <input type="date" name="od" />

      <label for="do">do: </label>
      <input type="date" name="do" />

      <button>Wyszukaj</button>
    </form>

    <!--blok główny-->
    <main>
      <table>
        <tr>
          <th>Nr zamówienia</th>
          <th>Nazwisko</th>
          <th>Imię</th>
          <th>Kolor</th>
          <th>Pojemność [m]</th>
          <th>Data odbioru</th>
        </tr>

        <?php

          $conn = mysqli_connect("localhost", "root", "", "mieszalnia");
          $request = "SELECT klienci.Nazwisko, klienci.Imie, zamowienia.id, zamowienia.kod_koloru, zamowienia.pojemnosc, zamowienia.data_odbioru FROM `klienci` INNER JOIN zamowienia ON klienci.Id = zamowienia.id GROUP BY zamowienia.data_odbioru ASC;";
          if($_SERVER["REQUEST_METHOD"] == "POST"){
            $od = $_POST['od'];
            $do = $_POST['do'];

            if(isset($od) == TRUE && isset($do) == TRUE){
              $request = "SELECT klienci.Nazwisko, klienci.Imie, zamowienia.id, zamowienia.kod_koloru, zamowienia.pojemnosc, zamowienia.data_odbioru FROM `klienci` INNER JOIN zamowienia ON klienci.Id = zamowienia.id WHERE zamowienia.data_odbioru BETWEEN '".$od."' AND 
              '".$do."' GROUP BY zamowienia.data_odbioru ASC;";
            }
          }
          $response = mysqli_query($conn, $request);
          while($row = mysqli_fetch_array($response)){
            echo "<tr>
              <td>".$row['id']."</td>
              <td>".$row['Nazwisko']."</td>
              <td>".$row['Imie']."</td>
              <td style='background-color:#".$row['kod_koloru'].";' >".$row['kod_koloru']."</td>
              <td>".$row['pojemnosc']."</td>
              <td>".$row['data_odbioru']."</td>
            </tr>";
          }

          mysqli_close($conn)
        ?>

      </table>
    </main>

    <!--stopka-->
    <footer>
      <h3>Egzamin INF.03</h3>
      <p>
        Autor:
        <a
          href="./https://pixelpick.pl/"
          target="_blank"
          style="color: rgb(138, 2, 90)"
          >Szpileczka</a
        >
      </p>
    </footer>
  </body>
</html>
