function VerifyUser(event) {
    // Previene el envío automático del formulario
    if (event) event.preventDefault();

    const usu = document.getElementById("txt_email").value.trim();
    const con = document.getElementById("txt_pass").value.trim();

    if (usu === "" || con === "") {
        Swal.fire({
            title: "Mensaje de Advertencia",
            text: "Llene los campos vacíos",
            icon: "warning",
            confirmButtonText: "Aceptar"
        });
        return false; // Evita la acción posterior
    }

    // Primera petición para verificar el usuario
    fetch('../controller/user/controller_verify_user.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ user: usu, pass: con })
    })
    .then(response => response.text())
    .then(resp => {
        if (resp == 0) {
            Swal.fire("Mensaje De Error", 'Usuario y/o contrase\u00f1a incorrecta', "error");
        } else {
            const data = JSON.parse(resp);
            if (data[0][5] === 'INACTIVO') {
                return Swal.fire(
                    "Mensaje De Advertencia",
                    "Lo sentimos el usuario " + usu + " se encuentra suspendido, comuníquese con el administrador",
                    "warning"
                );
            }
            // Segunda petición para crear sesión
            return fetch('../../controller/user/controller_create_session.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    iduser: data[0]._id, 
                    user: data[0].email,
                    role: data[0].role
                })
            })
            .then(() => {
                let timerInterval;
                Swal.fire({
                    title: 'BIENVENIDO AL SISTEMA',
                    html: 'Usted será redireccionado en <b></b> milisegundos.',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        timerInterval = setInterval(() => {
                            const content = Swal.getHtmlContainer();
                            if (content) {
                                const b = content.querySelector('b');
                                if (b) {
                                    b.textContent = Swal.getTimerLeft();
                                }
                            }
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then(result => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload();
                    }
                });
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire("Mensaje De Error", 'Ha ocurrido un error inesperado', "error");
    });
}


function SignUpUser(event){
    if (event) event.preventDefault();

    var name = $("#txt_name").val().trim();
    var usu = $("#txt_email").val().trim();
    var con = $("#txt_pass").val().trim();
    var termsAccepted = $("#check_terms").is(":checked"); // Obtiene el valor del checkbox

    if (usu === "" || con === "" || name==="") {
        Swal.fire({
            title: "Advertencia",
            text: "Llene los campos vacíos",
            icon: "warning",
            confirmButtonText: "Aceptar"
        });
        return false; // Evita la acción posterior
    } if (termsAccepted === false){
        Swal.fire({
            title: "Advertencia",
            text: "Acepte los términos y condiciones",
            icon: "warning",
            confirmButtonText: "Aceptar"
        });
        return false; // Evita la acción posterior
    }fetch('../controller/user/controller_create_user.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ name:name ,user: usu, pass: con })
    }).then(response => response.text())
    .then(resp => {
        try {
            const response = JSON.parse(resp);
    
            if (response.status === "success") {
                Swal.fire({
                    title: "Registro exitoso",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "Ir al login"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "login.php";
                    }
                });
            } else {
                Swal.fire({
                    title: "Error al registrar",
                    text: response.message,
                    icon: "error",
                    confirmButtonText: "Reintentar"
                });
            }
        } catch (e) {
            Swal.fire({
                title: "Error inesperado",
                text: "No se pudo procesar la respuesta del servidor.",
                icon: "error",
                confirmButtonText: "Aceptar"
            });
        }
    });
    
}