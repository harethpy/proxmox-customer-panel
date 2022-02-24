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

// Request($path, array $params = null, $method="GET")


function objectToArray ($object) {
    if(!is_object($object) && !is_array($object)){
        return $object;
    }
    return array_map('objectToArray', (array) $object);
}

//print_r(Nodes::qemuClone("usa2", 102, $data = array("full" => true, "name" => "thegew", "storage" => "local", "newid" => 692)));

//foreach(Nodes::qemuCurrent("usa2", 692) as $obj)
//{
//   echo $obj->status;
//}



$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

$sql = "SELECT  id, location, server, ip, reseller_notes, owner_api, suspended, vmid, flag FROM `rs_active_servers` ";
if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0)
    {
    	 while($row = mysqli_fetch_array($result)){
             if($row['owner_api'] == $_SESSION['owner_api'] && $row['suspended'] == 0) {
                        $net = Request::Request('/nodes/usa2/qemu/'.$row['vmid'].'/agent/network-get-interfaces', null, 'GET');
                        $ntArr = objectToArray($net);
                        

                 echo "<tr>";
                 echo "<td>" . $row['id'] . "</td>";
                 echo "<td>" . $row['owner_api'] . "</td>";
                 echo "<td>" . $row['server'] . "</td>";
                 echo "<td><img src='https://flagcdn.com/h20/".$row['flag'].".png' width='32'> " . $row['location'] . "</td>";
                 echo "<td> <span class='badge bg-success text-white'>".$ntArr['data']['result'][0]['ip-addresses'][1]['ip-address']."</span></td>";


                 echo "<td>" . $row['reseller_notes'] . "</td>";
                 echo '<td>
                    <div class="button-box col-lg-11">
                    
                    <a style="color:white !important;" href="src/vm_funcs/reboot.php?id=' . $row['vmid'] . '"> 
                    <button type="button" class="btn btn-primary tt btn-sm" data-toggle="tooltip" data-placement="top" title="Reboot server">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                    </button>
                    </a>
    
                    <a style="color:white !important;" href="src/vm_funcs/stop.php?id=' . $row['vmid'] . '">
                    <button type="button" class="btn btn-danger tt btn-sm" data-toggle="tooltip" data-placement="top" title="Stop server">
                    <i class="fa fa-stop" aria-hidden="true"></i></button>
                    </a>
    
                    <a style="color:white !important;" href="src/vm_funcs/start.php?id=' . $row['vmid'] . '">
                    <button type="button" class="btn btn-success tt btn-sm" data-toggle="tooltip" data-placement="top" title="Start server">
                    <i class="fa fa-play" aria-hidden="true"></i>
                    </button>
                    </a>
    
                   
                    
                        <div class="modal" id="exampleModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to suspend <strong>' . $row['id'] . ' : ' . $row['server'] . '</strong></p>
                                </div>
                                 <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="src/delete.php?id=' . $row["id"] . '"><button type="button" class="btn btn-danger">Suspend</button></a>
                              </div>
                            </div>
                        </div>
                    </div>
                </td>';
                 echo "<td>" . $row['vmid'] . "</td>";
                 echo '<td> <a style="color:white !important;" >
                    <button type="button" class="btn btn-danger tt btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModal"data-toggle="tooltip" data-placement="top" title="Suspend Server, This will suspend the server and make it inaccessible. Resources will be deleted after a 3 days of suspension">
                    <i class="fa fa-minus-square" aria-hidden="true"></i>
                    </button>
                    </a>
                    </div></td>';


             }
    	 }
          
    }
}



mysqli_close($db);


