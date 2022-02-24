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

    <title>Order - Overlaxed</title>

</head>

<body style="position: relative !important;">
<?php include("../headers/navbar.php"); ?>

<div class="panel fs-6 row justify-content-center" style="padding:35px;margin:20px;border:1px solid #ddd;">
    <h1>Configure server</h1>
    <p>Delivery takes upto 2 hours depending on your configuration</p>
    <br>
    <form class="col-md-10" action="order/order.php">
        <input type="input" class="form-control" name="type" id="type" value="custom" hidden/>
        <div class="accordion accordion-flush" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        Hardware Configuration
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col">
                                <label for="memoryControlSelect">Memory</label>
                                <select class="form-control" name="memoryControlSelect" id="memoryControlSelect" onchange="calculatePrice()">
                                    <option value="2|2" selected>2GB | 2048MB $2.00 </option>
                                    <option value="4|4">4GB | 4096MB $4.00 </option>
                                    <option value="6|6">6GB | 6144MB $6.00 </option>
                                    <option value="8|8">8GB | 8192MB $8.00 </option>
                                    <option value="12|12">10GB | 10240MB $12.00 </option>
                                    <option value="14|14">12GB | 12288MB $14.00 </option>
                                    <option value="16|16">16GB | 16384MB $16.00 </option>
                                    <option value="18|20">20GB | 20480MB $18.00 </option>
                                    <option value="24|30">30GB | 30720MB $24.00</option>
                                    <option value="24|40">40GB | Soon </option>
                                    <option value="24|60">60GB | Soon </option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="cpuControlSelect">CPU Cores</label>
                                <select class="form-control" name="cpuControlSelect" id="cpuControlSelect" onchange="calculatePrice()">
                                    <option value="0.5|1" selected>1 vCPU $0.50</option>
                                    <option value="1|1">2 vCPU $1.00</option>
                                    <option value="2|4">4 vCPU $2.00</option>
                                    <option value="3|6">6 vCPU $3.00</option>
                                    <option value="4|8">8 vCPU $8.00</option>
                                    <option value="5|10">10 vCPU $5.00</option>
                                    <option value="6|12">12 vCPU $6.00</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="osControlSelect">Operating System</label>
                                <select class="form-control" name="osControlSelect" id="osControlSelect">
                                    <option value="Windows_Server_2012R2" selected>Windows Server 2012R2</option>
                                    <option value="Windows_Server_2016">Windows Server 2016</option>
                                    <option value="Windows_Server_2019">Windows Server 2019</option>
                                    <option value="Windows_10">Windows 10</option>
                                    <option value="Windows_11">Windows 11</option>
                                    <option value="CentOS_7">Linux CentOS 7</option>
                                    <option value="CentOS_8">Linux CentOS 8</option>
                                    <option value="Debian_10">Linux Debian 10 Buster</option>
                                    <option value="Debian_11">Linux Debian 11 Bullseye</option>
                                    <option value="Ubuntu_18_04">Linux Ubuntu 18.04</option>
                                    <option value="Ubuntu_20_04">Linux Ubuntu 20.04</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Network Configuration
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="networkControlSelect" name="networkControlSelect">Port Speed</label>
                                <select class="form-control" name="networkControlSelect" id="networkControlSelect" onchange="calculatePrice()">
                                    <option value="3|1Gbps" selected>1Gbps $3.00</option>
                                </select>
                            </div>
                            <div class="col-sm-5">
                                <label for="ipControl">Dedicated IP(s)</label>
                                <select class="form-control" name="ipControl" id="ipControl">
                                    <option value="1">1 Dedicated IP</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Storage Configuration
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="diskZeroControlSelect">IDE Storage Disk 0(GB)</label>
                                <input type="number" name="disk0Input" id="diskZeroControlSelect" value="30" class="form-control" onchange="calculatePrice()" placeholder="30" min="30" max="300"  step="10" onKeyDown="return false">
                            </div>
                            <div class="col-sm-5">
                                <label for="diskOneControlSelect">IDE Storage Disk 1(GB)</label>
                                <input type="number" name="disk1Input" id="diskOneControlSelect" value="0" onchange="calculatePrice()"  class="form-control" id="diskZeroControlSelect" placeholder="0" min="0" max="200"  step="10" onKeyDown="return false">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Login Configuration
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFour">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="userLogin">Username:</label>
                                <input type="text" name="usrnameInput" class="form-control" id="userLogin" value="Administrator" readonly  >
                            </div>
                            <div class="col-sm-5">

                                <label for="passwordLogin">Password</label>
                                <input type="text" name='pwdInput' class="form-control" id="passwordLogin" value=
                                <?php
                                $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                                $pass = array(); //remember to declare $pass as an array
                                $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
                                for ($i = 0; $i < 8; $i++) {
                                    $n = rand(0, $alphaLength);
                                    $pass[] = $alphabet[$n];
                                }
                                echo implode($pass); //turn the array into a string

                                ?> placeholder="Password" readonly >
                            </div>
                        </div>
                        <br>
                        <hr />
                        <div class="row ">
                            <div class="col d-inline-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="datacenter" value="Netherlands" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <img src="https://flagcdn.com/w40/nl.png">
                                        Netherlands, Amsterdam
                                    </label>
                                </div>
                                &ensp;&ensp;&ensp;&ensp;
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="datacenter" value="United States" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <img src="https://flagcdn.com/w40/us.png">
                                        United States, NY
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <br>
        <input type="number" name="priceInput" id="priceInputHidden" class="form-control" hidden/>
        <h4 id="totalPricing">Total : $0.00</h4>
        <button type="submit" class="btn btn-primary"
                onclick="">Order Now</button>
    </form>




    <script>
        function calculatePrice(){

            //Get selected data
            var elt = document.getElementById("memoryControlSelect");
            var memory = elt.options[elt.selectedIndex].value;

            elt = document.getElementById("cpuControlSelect");
            var cpu = elt.options[elt.selectedIndex].value;
            cpu = cpu.split("|")[0];

            elt = document.getElementById("networkControlSelect");
            var net = elt.options[elt.selectedIndex].value;
            net = net.split("|")[0];

            var disk0 = document.getElementById("diskZeroControlSelect").value;
            var disk1 = document.getElementById("diskOneControlSelect").value;

            //convert data to integers
            memory = parseInt(memory);
            cpu = parseInt(cpu);
            net = parseInt(net);
            disk0 = parseInt(disk0);

            if(disk0 === 30)
            {
                disk0 = 0;
                console.log(disk0);
            } else {
                disk0 = disk0 - 30;
                disk0 = 0.1 * disk0
            }
            disk1 = 0.05*disk1;

            //calculate total value
            var total = memory+cpu+net+disk0+disk1;

            //print value to  PicExtPrice
            document.getElementById("totalPricing").innerHTML ="Total : $" + total;
            document.getElementById("priceInputHidden").value = total;

        }
        calculatePrice();
    </script>





    <script type="text/javascript">
        const tooltips = document.querySelectorAll('.tt');
        tooltips.forEach(t => {
            new bootstrap.Tooltip(t)
        })

        var selectobject;
        selectobject = document.getElementById("memoryControlSelect").getElementsByTagName("option");
        selectobject[4].disabled = true;
        $('#memoryControlSelect').selectpicker('refresh');

    </script>


</body>
</html>