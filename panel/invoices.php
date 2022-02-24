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


    <title>Invoices - Overlaxed</title>
</head>

<body>
<?php include("../headers/navbar.php"); ?>

<div class="panel fs-6" style="padding:35px;margin:20px;border:1px solid #ddd;">
    <div class="row ">
        <?php
        if(!empty($_GET['message'])) {
            if($_GET['message'] == 'custom_server'){
                echo '<div class="alert alert-success" role="alert">
                Your Server request has been created with <b>Invoice #'.$_GET['invoice_id'].'</b>
            </div>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert">
                Manage your invoices
            </div>';
        }
        ?>


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Due date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Gateway</th>
                </tr>
                </thead>
                <tbody>

                <?php

                function getStatus($status)
                {
                    if($status == 'unpaid')
                    {
                        return '<button type="submit" name="submit" class="btn btn-danger">Pay</button>';
                    }
                }

                $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
                $sql = "SELECT * from rs_invoices WHERE owner_api=".$_SESSION['owner_api']."";

                if($result = mysqli_query($db, $sql)){

                }
                if(mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo ' <tr>
                        <th scope="row">'.$row['id'].'</th>
                        <td>'.$row['name'].'</td>
                        <td>'.date_format(date_create($row['due_date']),"d/m/Y").'</td>
                        <td>'.$row['amount'].'</td>
                        <td>'.$row['status'].'</td>
                        <td>'.ucfirst($row['payment_gateway']).'</td>
                        <form class="paypal" action="order/payment.php" method="post" id="paypal_form">
                                <input type="hidden" name="cmd" value="_xclick" />
                                <input type="hidden" name="no_note" value="1" />
                                <input type="hidden" name="lc" value="US" />
                                <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
                                <input type="hidden" name="first_name" value="kustmer" />
                                <input type="hidden" name="last_name" value="kare" />
                                <input type="hidden" name="payer_email" value="sb-lorts13101416@business.example.com" />
                                <input type="hidden" name="item_number" value="123456" / >
                        <td>'.getStatus($row['status']).'</td></tr></form>';

                    }
                }

                ?>

                </tbody>
            </table>
        </div>
</div>
</body>

</html>