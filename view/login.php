<?php
    session_start();
    if(isset($_SESSION['S_IDUSER'])){
        header('Location:index.php');
        exit;
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login / Moon Lectures</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">
  </head>
  <body >
  <section class="d-flex align-items-center" style="min-height: 100vh; background-color: hsl(210, 10%, 15%); color: hsl(0, 0%, 96%)">
    <!-- Jumbotron -->
    <div class="container">
        <div class="row gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h1 class="my-5 display-3 fw-bold ls-tight">
                    Bienvenido a<br />
                    <span class="text-primary">Moon Lectures</span>
                </h1>

                <p>
                🔹Explora nuestros artículos 🔹Descubre blogs 🔹Mantente informado 🔹Aprende con nuestras guías
                </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card bg-dark text-light">
                    <div class="card-body py-5 px-md-5">
                        <form>
                            <!-- Email input -->
                            <div class="form-outline validate-input mb-4" data-validate="Username is required">
                                <input type="email" id="txt_email" autocomplete="off" class="input100 form-control bg-dark text-light border-light" />
                                <label class="form-label text-light" for="txt_usu">Email</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline validate-input mb-4" data-validate="Password is required">
                                <input type="password" id="txt_pass" class="input100 form-control bg-dark text-light border-light" />
                                <label class="form-label text-light" for="txt_pass">Contraseña</label>
                            </div>

                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input bg-dark border-light" type="checkbox" value="" id="check_remember_usu" checked />
                                    <label class="form-check-label text-light" for="check_remember_usu"> Recordar contraseña </label>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <button type="button" class="btn btn-primary btn-block mb-4" onclick="VerifyUser()">
                                Iniciar
                            </button>

                            <!-- Register button -->
                            <div class="text-center">
                                <p>¿No tienes una cuenta? 
                                    <a href="signup.php" class="text-primary">Regístrate aquí</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>

  


    <!---------------------------------------- add ons ----------------------------------------> 
    <script src="../vendor/sweetalert2/sweetalert2.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.min.js"></script>
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    
    <!---------------------------------------- controller ----------------------------------------> 
    <script src="assets/js/user.js"></script>

  </body>
</html>
