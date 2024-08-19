<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN</title>
    <?php include '../componentes/head.php'; ?>
</head>
<body>

    <div class="row py-4">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-primary rounded p-4 text-light">
            <div class="d-flex justify-content-between">
                <h4>Login</h4>
                <a href="../"><button class="btn btn-sm btn-light">Volver</button></a>
            </div>
            <div class="bg-light pt-1 my-2"></div>

            <form action="index.php" method="POST" class="px-4">

                <label class="p-1">Correo</label>
                <input class="form-control form-control-sm bg-light " type="email" name="email" required>
                <br>
                <label class="p-1">Contraseña</label>
                <input class="form-control form-control-sm bg-light " type="password" name="pass" required>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-sm btn-light px-4">Entrar<i
                            class="bi bi-caret-right-fill"></i></button>
                </div>
            </form>


            <!-- <label class="p-1 w-25">Hora Inicio: </label>
            <input class="form-control form-control-sm bg-light w-25 border border-dark my_input"
                type="time" name="start" required> -->

        </div>
    </div>

</body>
<script>
    <?php 
    echo ($msg == '' ? '':$msg);
    ?>
    let login = localStorage.getItem('login_user');
    console.log(JSON.parse(login));
    
    if (login) {
        Swal.fire({
            icon: "info",
            title: "Sesión ya iniciada",
            text: "Ya se cuenta con una sesión iniciada",
            confirmButtonText: "Continuar con sesión existente",
            showDenyButton:'true',
            denyButtonText: "No iniciar con sesión nueva"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = 'http://localhost/Ejercicio%20pr%C3%A1ctico%20-%20DB/';
            }
            if (result.isDenied) {
                localStorage.removeItem('login_user');
            }
        })
            ;

    }
</script>
</html>