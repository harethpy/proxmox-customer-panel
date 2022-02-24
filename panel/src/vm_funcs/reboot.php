<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

use Proxmox\Request;
use Proxmox\Access;
use Proxmox\Cluster;
use Proxmox\Nodes;
use Proxmox\Pools;
use Proxmox\Storage;
$configure = [
    'hostname' => '146.0.74.213',
    'username' => 'root',
    'password' => 'mothannA123!@#'
];
Request::Login($configure); // Login ..


require("../../../config/db.php");

if(isset($_GET['id']))
{
    Nodes::qemuReboot("usa2", $_GET['id'], $data = array());
    echo "<h1>Server deleted.. redirecting</h1>";
    header( "Location: ../../manage_servers.php" );

}

?>