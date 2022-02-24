<!doctype html>
<html lang="en">
<head>
    <?php
    include('../config/session.php');
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Instant Servers - Overlaxed</title>

</head>

<body style="position: relative !important;">
<?php include("../headers/navbar.php"); ?>

    <div class="panel fs-6 row justify-content-center" style="padding:35px;margin:20px;border:1px solid #ddd;">
        <h1>Instant servers</h1>
        <h5>Pre-Deployed Server, Instant access when acquired.</h5>
        <br>
        <table class="table align-self-center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Configurations</th>
                <th scope="col">Name</th>
                <th scope="col">Location</th>
                <th scope="col">Price/mo</th>
                <th scope="col">Qty.</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
                <?php include('src/display_instant_servers.php') ?>
            </tbody>
        </table>

    <script type="text/javascript">
        const tooltips = document.querySelectorAll('.tt');
        tooltips.forEach(t => {
            new bootstrap.Tooltip(t)
        })

    </script>
</body>
</html>