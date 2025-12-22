<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kalendarz</title>
    <link rel="stylesheet" href="./styl.css" />
  </head>
  <body>
    <!--nagłówek-->
    <header>
      <h1>Dni, miesiące, lata...</h1>
    </header>

    <!--blok ,,napisu" xd-->
    <article>
      <p>
        <?php

          $dataDzisiaj = date("m-d");
          $dzienTygodnia;
          $spr = date("D");

          switch($spr){
            case "Mon":
              $dzienTygodnia = "Poniedziałek";
              break;
            case "Tue":
              $dzienTygodnia = "Wtorek";
              break;
            case "Wed":
              $dzienTygodnia = "Środa";
              break;
            case "Thu":
              $dzienTygodnia = "Czwartek";
              break;
            case "Fri":
              $dzienTygodnia = "Piątek";
              break;
            case "Sat":
              $dzienTygodnia = "Sobota";
              break;
            case "Sun":
              $dzienTygodnia = "Niedziela";
              break;
          }

          $conn = new mysqli("localhost", "root", "", "kalendarz");
          $request1 = "SELECT `imiona` FROM `imieniny` WHERE `data` = '".$dataDzisiaj."';";
          $result1 = mysqli_query($conn, $request1);
          while($row = mysqli_fetch_array($result1)){
            echo "Dzisiaj jest ". $dzienTygodnia .", ". date("d-m-y") .", imieniny: ". $row["imiona"];
          }


        ?>
      </p>
    </article>

    <!--blok1 / blok lewy-->
    <aside>
      <table>
        <tr>
          <th>liczba dni</th>
          <th>miesiąc</th>
        </tr>
        <tr>
          <td rowspan="7">31</td>
          <td>styczeń</td>
        </tr>
        <tr>
          <td>marzec</td>
        </tr>
        <tr>
          <td>maj</td>
        </tr>
        <tr>
          <td>lipiec</td>
        </tr>
        <tr>
          <td>sierpień</td>
        </tr>
        <tr>
          <td>październik</td>
        </tr>
        <tr>
          <td>grudzień</td>
        </tr>
        <tr>
          <td rowspan="4">30</td>
          <td>kwiecień</td>
        </tr>
        <tr>
          <td>czerwiec</td>
        </tr>
        <tr>
          <td>wrzesień</td>
        </tr>
        <tr>
          <td>listopad</td>
        </tr>
        <tr>
          <td>28 lub 29</td>
          <td>luty</td>
        </tr>
      </table>
    </aside>

    <!--blok2 / blok środkowy-->
    <main>
      <h2>Sprawdź kto ma urodziny</h2>
      <form method="POST">
        <input
          name = "calendar"
          type="date"
          min="2024-01-01"
          max="2024-12-31"
          value="2024-01-01"
        />
        <button type="submit">Wyślij</button>
      </form>
      <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $myDate = $_POST['calendar'];
          $format = date("m-d", strtotime($myDate));
          
          $request2 = "SELECT `imiona` FROM `imieniny` WHERE `data` = '".$format."';";
          $result2 = mysqli_query($conn, $request2);
          while($row2 = mysqli_fetch_array($result2)){
            echo "Dnia ".$myDate." są imieniny ".$row2['imiona'];
          }

        }

        mysqli_close($conn);
      ?>
    </main>

    <!--blok3 / blok prawy-->
    <section>
      <a href="https://pl.wikipedia.org/wiki/Kalendarz_Majów" target="_blank">
        <img src="./kalendarz.gif" alt="Kalendarz Majów" />
      </a>
      <h2>Rodzaje kalendarzy</h2>
      <ol>
        <li>
          słoneczny
          <ul>
            <li>kalendarz Majów</li>
            <li>juliański</li>
            <li>gregoriański</li>
          </ul>
        </li>
        <li>
          księżycowy
          <ul>
            <li>starogrecki</li>
            <li>babiloński</li>
          </ul>
        </li>
      </ol>
    </section>

    <!--stópkaa :)-->
    <footer>
      <p>
        Stronę opracowała:
        <a href="https://pixelpick.pl/" target="_blank" style="color: rgba(183, 5, 151, 1)">Szpileczka</a>
      </p>
    </footer>
  </body>
</html>
