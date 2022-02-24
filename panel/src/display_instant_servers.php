<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$sql = "SELECT  * FROM `instant_servers` ";

if($result = mysqli_query($db, $sql)){
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr></tr><td>" . $row['id'] . "</td>";
            echo "<td>" . $row['configurations'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>£" . $row['price'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td><button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#a".$row['id']."'>Order</button></td>";

            echo '<div class="modal fade" id="a'.$row['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Server Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <span>'.$row['configurations'].'</span><br>
                      <span>' . $row['name'] . '</span><br><br>
                        <form>
                            <div class="row g-3 align-items-center">
                                  <div class="mb-3 row">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">OS</label>
                                    <div class="col-sm-10">
                                       <input class="form-control"  list="datalistOptions" id="exampleDataList" placeholder="Choose OS" required>
                                    <datalist id="datalistOptions" >
                                      <option value="Windows Server 2019">
                                      <option value="Windows Server 2016">
                                      <option value="Windows Server 2012R2">
                                      <option value="Windows 10">
                                    </datalist>
                                    </div>
                                  </div>
                                  <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Location</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" id="inputPassword" value="' . $row['location'] . '" disabled readonly>
                                    </div>
                                  </div>  
                                  <div class="mb-3 row">
                                    <label for="hostname" class="col-sm-2 col-form-label">Hostname</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" id="hostname" value="vm.ready">
                                    </div>
                                  </div>  
                                  
                                   <div class="mb-3 row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                      <input class="form-control" id="password" value="' . randomPassword() . '">
                                    </div>
                                  </div>  
                        </form>
                      </div>
                      <h3>Total:  £' . $row['price'] . '</h3>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onClick="window.location.reload();" data-bs-dismiss="modal">Close</button>
                        <a href="../panel/order/order.php?type=instant&id='.$row['id'].'"><button type="button" class="btn btn-primary">Order</button></a>
                      </div>
                    </div>
                  </div>
                </div></tr>';
        }

    }
}

mysqli_close($db);


