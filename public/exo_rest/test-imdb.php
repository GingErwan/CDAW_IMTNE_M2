<?php

    $curl = curl_init();

    $apiKey = "k_8lu5mfr5";
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://imdb-api.com/en/API/Top250Movies/".$apiKey,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ));
    
    $json = curl_exec($curl);
    
    curl_close($curl);

    $decodedJson = json_decode($json, true)["items"];
    
    $array = '<table><tr><td>Rank</td><td>Title</td><td>Year</td><td>Crew</td></tr>';

    foreach($decodedJson as $film){
        $array .= '<tr><td>'.$film["rank"].'</td><td>'.$film["title"].'</td><td>'.$film["year"].'</td><td>'.$film["crew"].'</td></tr>';
    }

    $array .= "</table>";

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style>
		table {
			border-top: 1px solid black;
			border-bottom: 1px solid black;
		}

		td {
			text-align: center;
			padding-left: 2em;
			padding-right: 2em;
		}
		</style>
	</head>
	<body>
	<h1>Top 250 Movies</h1>
		<?php
			echo $array;
		?>
	</body>
</html>