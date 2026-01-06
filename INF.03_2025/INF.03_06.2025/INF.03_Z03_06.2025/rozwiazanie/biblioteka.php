<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles.css" />
    <title>BIBLIOTEKA SZKOLNA</title>
  </head>
  <body>
    <!--Blok nagłówkowy-->
    <header>
      <h2>STRONA BIBLIOTEKI SZKOLNEJ WIEDZAMIN</h2>
    </header>

    <!--Blok sekcji-->
    <section>
      <h3>Nasze dzisiejsze propozycje:</h3>
      <table>
        <tr>
          <th>Autor</th>
          <th>Tytuł</th>
          <th>Katalog</th>
        </tr>
        <?php 
          $conn = mysqli_connect("localhost", "root", "", "biblioteka");
          $request = "SELECT `autor`, `tytul`, `kod` FROM `ksiazki` ORDER BY RAND() LIMIT 5;";
          $response = mysqli_query($conn, $request);
          while($row = mysqli_fetch_array($response)){
            echo "<tr>
            <td>".$row['autor']."</td>
            <td>".$row['tytul']."</td>
            <td>".$row['kod']."</td>
            </tr>";
          }

          mysqli_close($conn);
        ?>
      </table>
    </section>

    <!--Blok główny-->
    <main>
      <article class="a1">
        <img src="./ksiazka1.jpeg" alt="okładka książki" />
        <p>
          Według różnych podać najpaskudniejsza ropucha nosi w głowie piękny,
          cenny klejnot.
        </p>
      </article>
      <article class="a2">
        <img src="./ksiazka2.jpeg" alt="okładka książki" />
        <p>
          Panna Stefcia i Maryla nie są to zbyt grzeczne damy, nawet nie
          słuchają mamy...
        </p>
      </article>
      <article class="a3">
        <img src="./ksiazka3.jpeg" alt="okładka książki" />
        <p>
          Ratuj mnie, przyjacielu, w ostatniej potrzebie: Kocham piękną Irenę.
          Rodzice i ona...
        </p>
      </article>
    </main>

    <!--Stopka-->
    <footer>
      <p>
        Stronę wykonała:
        <a
          href="https://pixelpick.pl/"
          target="_blank"
          style="color: rgba(118, 0, 83, 1)"
          >Szpileczka
        </a>
      </p>
    </footer>
  </body>
</html>
