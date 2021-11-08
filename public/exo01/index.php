<html>
    <head>
        <meta http-equiv="refresh" content="10">
    </head>
        
    <body>
        <h1>Heure courante :</h1>

        <?php
        // get current time and date
        date_default_timezone_set('Europe/Paris');
        $date = date('d/m/Y H:i:s', time());
        echo "$date"
        ?>
    </body>
</html>