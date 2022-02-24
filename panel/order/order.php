<?php

include('../../config/session.php');

if(isset($_GET['type']))
{
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    if($_GET['type'] == 'instant')
    {

        $sql = "SELECT * from instant_servers WHERE id=".$_GET['id'];
        if($result = mysqli_query($db, $sql)) {
            $row = mysqli_fetch_array($result);
            $query =
                "INSERT INTO rs_invoices (id, name, creation_date, due_date, amount, owner_api, status, payment_gateway)
                values (default, '".$row['name']."' ,CURDATE(), CURDATE() + INTERVAL 2 DAY, 
                ".$row['price'].", ".$_SESSION['owner_api'].", 'unpaid', 'paypal');";
            $query .= "UPDATE instant_servers SET `quantity` = `quantity` - 1 WHERE id = '".$_GET['id']."'";
           mysqli_multi_query($db, $query);
        }

    } else if ($_GET['type'] == 'custom')
    {
        $query = 'INSERT INTO rs_custom_requests 
                (id, memory, cpu, os, port_speed, ip, disk_0, disk_1, username, password, datacenter, price) 
                values (
                default, 
                '.(int)explode("|", $_GET['memoryControlSelect'])[1].', 
                '.explode("|", $_GET['cpuControlSelect'])[1].',
                "'.$_GET['osControlSelect'].'",
                "'.explode("|", $_GET['networkControlSelect'])[1].'",
                '.$_GET['ipControl'].',
                '.$_GET['disk0Input'].',
                '.$_GET['disk1Input'].',
                "'.$_GET['usrnameInput'].'",
                "'.$_GET['pwdInput'].'",
                "'.$_GET['datacenter'].'",
                '.$_GET['priceInput'].'
                )             
                                
                               ';
        $db->query($query);
        $server_name = (int)explode("|", $_GET['memoryControlSelect'])[1].
            "vCore / 
            ".explode("|", $_GET['cpuControlSelect'])[1]." DDR4 
            / ".$_GET['disk0Input']."GBxDisk1 / ".$_GET['disk1Input']."GBxDisk2 / ".$_GET['ipControl']." Dedicated IP  / Anti-DDoS / ".$_GET['datacenter']. " / ".$_GET['osControlSelect'];

        $create_invoice =
        'INSERT INTO rs_invoices (id, name, creation_date, due_date, amount, owner_api, status, payment_gateway)
         values (default, "'.$server_name.'",CURDATE(), CURDATE() + INTERVAL 2 DAY, '.$_GET['priceInput'].', '.$_SESSION['owner_api'].', "unpaid", "paypal")
        ';
        $db->query($create_invoice);

        header("Location: ../invoices.php?message=custom_server&invoice_id=".$db -> insert_id."");
    }
    $db -> close();
}
?>