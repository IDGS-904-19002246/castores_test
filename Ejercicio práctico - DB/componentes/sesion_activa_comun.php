<script>
    let login = localStorage.getItem('login_user');
    if (login) {
        var data = JSON.parse(login);
        if (data[0].idRol != 2) {
            window.location = "http://localhost/Ejercicio%20pr%C3%A1ctico%20-%20DB/"
        }
    }else{
        window.location = "http://localhost/Ejercicio%20pr%C3%A1ctico%20-%20DB/";
    }
</script>