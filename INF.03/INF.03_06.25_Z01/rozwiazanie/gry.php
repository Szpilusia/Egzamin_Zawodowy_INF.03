<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styl.css"></link>
    <title>Gry Komputerowe</title>
</head>
<body>
    <!--Nagłówek-->
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>

    <!--Sekcja lewa-->
    <aside>
        <h3>Top 5 gier w tym miesiącu</h3>
        <ul>
            <?php 
                $conn = mysqli_connect('localhost', 'root', '', 'gry');
                $sql = "SELECT `nazwa`,`punkty` FROM `gry` ORDER BY `punkty` DESC LIMIT 5 ";
                $result = $conn->query($sql);

                if($result -> num_rows > 0){
                    while($row = $result -> fetch_assoc()){
                        echo "<li>".$row['nazwa']."<span class='Numberpoint'>".$row['punkty']."</span>"."</li>";
                    }
                }

            ?>
        </ul>
        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Stronę wykonała</h3>
        <p><a href="https://pixelpick.pl/" target="_blank" style="color : rgba(234, 1, 137, 1);">Szpileczka</a></p>
    </aside>

    <!--Sekcja środkowa-->
    <article>
        <?php
           $sql2 = "SELECT `id`, `nazwa`, `zdjecie` FROM `gry`";
           $result2 = $conn -> query($sql2);
           if($result2 -> num_rows > 0){
            while($row2 = $result2 -> fetch_assoc()){
                echo 
                "<figure>
                    <a title='".$row2['id']."'>
                        <img src='".$row2['zdjecie']."' alt='".$row2['nazwa']."'>
                    </a>
                    <p>".$row2['nazwa']."</p>
                </figure>";
            }
           } 
           
        ?>
    </article>
    <!--Sekcja prawa-->
    <section>
        <h3>Dodaj nową grę</h3>
        <form method="POST">
            <label>Nazwa</label><br>
                <input type="text" name="name"><br>
            <label>Opis</label><br>
                <input type="text" name="decription"><br>
            <label>Cena</label><br>
                <input type="text" name="price"><br>
            <label>Zdjęcie</label><br>
                <input type="text" name="imagesrc"><br>
            <button type="submit">DODAJ</button>    
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_POST['name']) && isset($_POST['decription']) && isset($_POST['price']) && isset($_POST['imagesrc'])){
                    $name= $_POST['name'];
                    $desc= $_POST['decription'];
                    $price= $_POST['price'];
                    $imagesrc= $_POST['imagesrc'];

                    $sql4 = "INSERT INTO `gry` (`id`, `nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES (NULL, '$name', '$desc', '0', '$price', '$imagesrc')";
                    mysqli_query($conn, $sql4);      
                }
            }
        ?>
    </section>
    <!--Footer-->
    <footer>
        <form method="POST">
            <input type="number" name="id">
            <button type="submit">Pokaż opis</button>
        </form>
        
        <?php 
            $id = 1;
            if($_SERVER["REQUEST_METHOD"] == "POST"){
               if(isset($_POST['id'])){
                $numb = $_POST['id'];
                $id = $numb;
               }
            }

            $sql3 = "SELECT `nazwa`, SUBSTRING(`opis`, 1, 100),`punkty`,`cena` FROM `gry` WHERE `id` = ".$id."";
            $result3 = mysqli_query($conn, $sql3);
            if($result3 -> num_rows > 0){
                while($row3 = $result3 -> fetch_assoc()){
                   echo "<h2>".$row3['nazwa'].",".$row3['punkty']." punktów, ".$row3['cena']." zł</h2>
                        <p>".$row3['SUBSTRING(`opis`, 1, 100)']."</p>";
                }
            }else{
                echo "<h2>Wybierz inny numerek gry</h2>
                    <p>Polecamy tę pod numerem 2 :)</p>";

            }
            
            mysqli_close($conn);
        ?>
    </footer>
</body>
</html>