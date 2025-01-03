<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up / Moon Lectures</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">
  </head>
  <body>
    <section class="d-flex align-items-center" style="min-height: 100vh; background-color: hsl(210, 10%, 15%); color: hsl(0, 0%, 96%)">
        <!-- Jumbotron -->
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        Crea tu cuenta<br />
                        <span class="text-primary">Moon Lectures</span>
                    </h1>

                    <p>
                    🔹Explora artículos 🔹Descubre blogs 🔹Mantente informado 🔹Aprende con nuestras guías
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card bg-dark text-light">
                        <div class="card-body py-5 px-md-5">
                            <form>
                                <!-- Name input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="txt_name" class="form-control bg-dark text-light border-light" />
                                    <label class="form-label text-light" for="txt_name">Nombre</label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="txt_email" autocomplete="off" class="form-control bg-dark text-light border-light" />
                                    <label class="form-label text-light" for="txt_email">Email</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="txt_pass" class="form-control bg-dark text-light border-light" />
                                    <label class="form-label text-light" for="txt_password">Contraseña</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="col d-flex justify-content-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark border-light" type="checkbox" value="" id="check_terms" />
                                        <label class="form-check-label text-light" for="check_terms"> Acepto los términos y condiciones </label>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <button type="button" class="btn btn-primary btn-block mb-4" onclick="SignUpUser()">
                                    Registrarse
                                </button>
                                <!-- Register button -->
                                <div class="text-center">
                                    <p>¿Ya tienes una cuenta? 
                                        <a href="login.php" class="text-primary">Iniciar sesión aquí</a>
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
