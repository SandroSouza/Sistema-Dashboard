$(document).ready(function() {
    function validateUser() {

        const params = {
            'operacao': 'validate',
        };

        $.post('src/usuario/model/crud-usuario.php', params, function(result) {
            console.log(result);
            if(result.tipo === 1 && result.status === 1) {
                console.log("Usuário valido!!!")
                $("#nome-usuario").append(result.nome)
            } else{
                window.location.replace("login.html");
            }
        }, 'json');
    }

    $("#btn-logout").click(function() {
        logoutUser();
    })

    function logoutUser() {
        const params = {
            'operacao': 'logout',
        };

        $.post('src/usuario/model/crud-usuario.php', params, function(result) {
            console.log(result);
            if(result.status === 1) {
                window.location.replace("login.html");
            } else{
                console.log("Erro logout")
            }
        }, 'json');
    }

    validateUser()
})