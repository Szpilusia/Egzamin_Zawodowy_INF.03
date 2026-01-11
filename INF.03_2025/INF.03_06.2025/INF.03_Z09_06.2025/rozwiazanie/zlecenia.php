<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styl.css" />
    <title>Remonty</title>
  </head>
  <body>
    <!--blok nagłówkowy-->
    <header>
      <h1>Malowanie i gipsowanie</h1>
    </header>

    <!--blok główny-->
    <main>
      <nav>
        <a href="./kontakt.html">Kontakt</a>
        <a href="https://remonty.p" target="_blank">Partnerzy</a>
      </nav>

      <aside>
        <img src="./images/tapeta_lewa.png" alt="usługi" />
        <img src="./images/tapeta_prawa.png" alt="usługi" />
        <img src="./images/tapeta_lewa.png" alt="usługi" />
      </aside>

      <section id="s1">
        <h2>Dla klientów</h2>
        <form method="POST">
          <label for="pracownicy" >Ilu co najmniej pracowników potrzebujesz?</label><br>
          <input type="number" name="pracownicy" />
          <button type="submit" name="form1" >Szukaj firm</button>
        </form>
        <article>
          <?php 
            $conn = mysqli_connect("localhost", "root", "", "remonty");

            if($_SERVER["REQUEST_METHOD"] == "POST"){
              if(isset($_POST['form1'])){
                $pracownicy = $_POST["pracownicy"];
                if(isset($pracownicy) && is_numeric($pracownicy) == TRUE){
                  $request = "SELECT `nazwa_firmy`, `liczba_pracownikow` FROM `wykonawcy` WHERE `liczba_pracownikow` >= ".$pracownicy.";";
                  $response = mysqli_query($conn, $request);
                  while($pozycje = mysqli_fetch_array($response)){
                    echo "<p>".$pozycje['nazwa_firmy'].", ".$pozycje['liczba_pracownikow']." pracowników</p>";
                  }
                }else{
                  echo "Wprowadź liczbę całkowitą";
                }
              }
            }
          ?>
        </article>
      </section>

      <section id="s2">

        <h2>Dla wykonawców</h2>

        <form method="POST">
          <select name="miejsce">
            <?php 
              $options = "SELECT DISTINCT `miasto` FROM `klienci` ORDER BY `miasto` ASC;";
              $wynik = mysqli_query($conn, $options);
              while($pick = mysqli_fetch_array($wynik)){
                echo "<option value='".$pick['miasto']."'>".$pick['miasto']."</option>";
              }
            ?>
            
          </select><br>

          <input type="radio" name="usluga" id="malowanie" value="malowanie" checked />
          <label for="malowanie">Malowanie</label><br />

          <input type="radio" name="usluga" id="gipsowanie" value="gipsowanie"/>
          <label for="gipsowanie">Gipsowanie</label><br />

          <button type="submit" name="form2">Szukaj klientów</button>
        </form>

        <ul>
          <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST"){
               if(isset($_POST['form2'])){
                $miejsce = $_POST['miejsce'];
                $usluga = $_POST['usluga'];
                $dane = "SELECT `imie`, cena FROM `klienci` INNER JOIN zlecenia ON klienci.id_klienta = zlecenia.id_klienta WHERE klienci.miasto = '".$miejsce."' AND zlecenia.rodzaj = '".$usluga."';";
                $klienci = mysqli_query($conn, $dane);
                while($lista = mysqli_fetch_array($klienci)){
                  echo "<li>".$lista['imie']." - ".$lista['cena']."</li>";
                }
               
              }
            }

            mysqli_close($conn);
          ?>
        </ul>
      </section>
    </main>

    <!--stopka-->
    <footer>
      <strong>
        <p>
          Stronę wykonała:
          <a href="https://pixelpick.pl/"  target="_blank">  Szpileczka </a>
        </p>
      </strong>
    </footer>
  </body>
</html>
