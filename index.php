<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    var_dump($_GET);

    $filtered_hotels = $hotels;

    if (isset($_GET["parking"]) && $_GET["parking"] === "1") {

        $filtered_hotels = [];

        for ($x = 0; $x < count($hotels); $x++) {
            if ($hotels[$x]["parking"]) {
                $filtered_hotels[] = $hotels[$x];
            }
        }

    }
    elseif (isset($_GET["parking"]) && $_GET["parking"] === "2") {

        $filtered_hotels = [];

        for ($x = 0; $x < count($hotels); $x++) {
            if ($hotels[$x]["parking"] === false) {
                $filtered_hotels[] = $hotels[$x];
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

</head>


<body>
    
    <div class="container-fluid">

        <form action="index.php" method="GET">

            <div class="container-fluid d-flex p-3">

                <div>
                    <label for="parking">Filtra per parcheggio</label>
                    <select class="form-select" name="parking">

                        <option selected>TUTTI</option>
                        <option value="1">Con parcheggio</option>
                        <option value="2">Senza parcheggio</option>

                    </select>
                </div>

                <div>
                    <label for="parking">Filtra per voto</label>
                    <select class="form-select" name="vote">

                        <option selected>TUTTI</option>
                        <option value="1">1 stella</option>
                        <option value="2">2 stelle</option>
                        <option value="3">3 stelle</option>
                        <option value="4">4 stelle</option>
                        <option value="5">5 stelle</option>

                    </select>
                </div>

            </div>

            <button class="btn btn-primary" type="submit">INVIA</button>

        </form>
            

        <table class="table">

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
            </thead>

            <tbody>

                <?php for ($x = 0; $x < count($filtered_hotels); $x++) { ?>
            
                    <tr>

                        <th> <?php echo $filtered_hotels[$x]["name"] ?> </th>
                        <th> <?php echo $filtered_hotels[$x]["description"] ?> </th>
                        <th> <?php echo $filtered_hotels[$x]["parking"] ? "Si" : "No " ?> </th>
                        <th> <?php echo $filtered_hotels[$x]["vote"] ?> </th>
                        <th> <?php echo $filtered_hotels[$x]["distance_to_center"]."Km" ?> </th>

                    </tr>

                <?php } ?>
            </tbody>

        </table>

    </div>

</body>


</html>