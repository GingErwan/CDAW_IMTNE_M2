<?php


    class FilmClass
    {
        public function __construct($title, $rank, $crew, $year)
        {
            $this->title = $title;
            $this->rank = $rank;
            $this->crew = $crew;
            $this->year = $year;
        }
    

        public static function getFilms()
        {
            if(!file_exists("list-films.json")){
                $fileList = fopen("list-films.json", "w");
                $curl = curl_init();
    
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://imdb-api.com/fr/API/Top250Movies/" . "k_8lu5mfr5",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                ));
                
                $json = curl_exec($curl);
                file_put_contents("list-films.json", $json);
                $listDecoded = json_decode($json, true)["items"];
                curl_close($curl);
            }
            else
            {
                $fileList = fopen("list-films.json", "r");
                $listDecoded = json_decode(file_get_contents("list-films.json"), true)["items"];
            }

            $filmArray = array();
                
            foreach($listDecoded as $i => $film){
                $filmArray[$i] = new FilmClass($film["title"], $film["rank"], $film["crew"], $film["year"]);
            };

            fclose($fileList);
            return $filmArray;
        }

        public static function showFilmsAsTable($films)
        {
            echo '<table><thead>
                    <tr><th>Rank</th><th>Title</th><th>Year</th><th>Crew</th></tr>
                </thead><tbody>';
            foreach($films as $film)
            {
                echo '<tr><td>'
                    .$film->rank.'</td><td>'
                    .$film->title.'</td><td>'
                    .$film->year.'</td><td>'
                    .$film->crew.'</td></tr>';
            }
            echo '</tbody></table>';
        }

        public static function showAllFilmsAsTable()
        {
            $filmsResponse = FilmClass::getFilms();
            static::showFilmsAsTable($filmsResponse);
        }

    }

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
			FilmClass::showAllFilmsAsTable();
		?>
	</body>
</html>