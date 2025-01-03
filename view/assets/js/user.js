function VerifyUser(event) {
    // Previene el envío automático del formulario
    if (event) event.preventDefault();

    var usu = $("#txt_email").val().trim();
    var con = $("#txt_pass").val().trim();

    if (usu === "" || con === "") {
        Swal.fire({
            title: "Mensaje de Advertencia",
            text: "Llene los campos vacíos",
            icon: "warning",
            confirmButtonText: "Aceptar"
        });
        return false; // Evita la acción posterior
    }
    $.ajax({
        url:'../controller/user/controller_verify_user.php',
        type:'POST',
        data:{
            user:usu,
            pass:con
        }
    }).done(function(resp){
        if(resp==0){
            Swal.fire("Mensaje De Error",'Usuario y/o contrase\u00f1a incorrecta',"error");
        }else{
            var data= JSON.parse(resp);
            if(data[0][5]==='INACTIVO'){
                return Swal.fire("Mensaje De Advertencia","Lo sentimos el usuario "+usu+" se encuentra suspendido, comuniquese con el administrador","warning");
            }
            $.ajax({
                url:'../../controller/user/controller_create_session.php',
                type:'POST',
                data: {
                    iduser: data[0]._id, // Suponiendo que usas MongoDB ObjectId
                    user: data[0].email,
                    role: data[0].role
                }
            }).done(function(resp){
                let timerInterval
                Swal.fire({
                title: 'BIENVENIDO AL SISTEMA',
                html: 'Usted sera redireccionado en <b></b> milisegundos.',
                timer: 2000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                        b.textContent = Swal.getTimerLeft()
                        }
                    }
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload();
                    }
                })
            })
           
        }
    })
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
    }
}