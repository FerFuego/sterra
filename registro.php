<?php require_once('inc/layout/head.php'); ?>

<!-- Verify Admin -->
<?php if ( ! $general->active_register ) {
    $host = $_SERVER['HTTP_HOST'];
    $page = 'index.php';
    $url = "http://$host/$page";
    header( "Location: $url", 401 );
    die();
} ?>
<!-- End Verify Admin -->

<!-- Header Section Begin -->
<?php require_once('inc/layout/header.php'); ?>
<!-- Header Section End -->

<div class="registro">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="section-title">
                    <h3>Registro para Clientes Minoristas / Consumidores finales</h3>
                    <h4><strong>ATENCIÓN</strong>: si tiene un comercio, debe comunicarse por WhatsApp al <a href="https://wa.me/543537671725" target="_blank">+54 9 3537 671725</a> para registrarse y obtener un USUARIO con precios mayoristas.</h4>
                </div>
            </div>

            <div class="col-lg-6 mx-auto mb-5">
                <form class="form-cli" id="js-form-register">
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input type="text" name="name" id="user_name">
                    </div>
                    <div class="form-group">
                        <label for="locality">Localidad</label>
                        <input type="text" name="locality" id="user_locality">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico (email)</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de Usuario (elige un nombre corto para tu usuario)</label>
                        <input type="text" name="username" id="user_cli">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="pass_cli">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="csrf" id="user_csrf" value="<?php echo $_SESSION["token"]; ?>">
                        <input type="hidden" name="control" id="user_control">
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" id="g-recaptcha" data-sitekey="<?php echo Store::get_site_key(); ?>"></div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary w-100" value="Registrarme">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section Begin -->
<?php require_once('inc/layout/footer.php'); ?>
<!-- Footer Section End -->