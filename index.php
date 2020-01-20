<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Censuratore PHP</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <h1 id="cens-title">Censuratore</h1>
        </header>
        <main>
            <?php
                $original_text = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."; //Testo originale
                $lowercase_text = strtolower($original_text); //Trasformo tutto il testo in lower case

                $badword = $_GET["word"]; //Prendo tramite GET da Url la badword
                $lowercase_badword = strtolower($badword); //Trasformo la badword in lower case

                $badword_length = strlen($badword); //Verifico lunghezza badword
                for ($i = 0; $i < $badword_length; $i++) { //ciclo in base alla lunghezza della parola
                    $badsign .= "*"; //Aggiungo ad una variabile un asterisco per ogni lettera
                }

                if (strpos($lowercase_text,$lowercase_badword) !== false) { //Verifico se è presente la parola nel testo originale
                    $new_text = str_replace($lowercase_badword,$badsign,$lowercase_text); //Sostituisco la parola con n *, in base alla lunghezza della parola
                    $new_text = ucfirst($new_text); //Setto la prima parola del testo maiuscola
                } else { //Se non è presente..
                    $new_text = "Non è stata trovata alcuna parola da censurare"; //Mando un messaggio
                }

            ?>
            <div class="text original">
                <h2>Testo originale</h2>
                <p><?php echo $original_text?></p>
            </div>
            <div class="text censured">
                <h2>Testo censurato</h2>
                <p><?php echo $new_text?></p>
            </div>
            <div id="panda-img">
                <img src="https://stickershop.line-scdn.net/stickershop/v1/product/1407844/LINEStorePC/main.png;compress=true" alt="img">
            </div>
        </main>
    </body>
</html>
