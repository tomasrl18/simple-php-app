<?php
    const API_URL = "https://whenisthenextmcufilm.com/api";

    # Inicializar una nueva sesión de cURl; ch = cURL handle
    $ch = curl_init(API_URL);

    // Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    /*
     * Ejecutar la petición
     * y guardamos el resultado
    */
    $result = curl_exec($ch);
    $data = json_decode($result, true);

    curl_close($ch);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
    <title>La próxima película de Marvel</title>
</head>
<body>
    <section>
        <img src="<?= $data['poster_url'] ?>" alt="Poster de <?= $data["title"] ?>" width="200" style="border-radius: 16px">
    </section>

    <hgroup>
        <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h3>
        <p>Fecha de estreno: <?= $data["release_date"] ?></p>
        <p>La siguiente es: <strong><?= $data["following_production"]["title"] ?></strong></p>
    </hgroup>
</body>
</html>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img {
        margin: 0 auto;
    }
</style>
