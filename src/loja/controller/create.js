$(document).ready(function(){
    // Ao clicar no botão de salvar, chamar a função
    $("#save-loja-btn").click(function () {
        createLoja();
    });

    function createLoja() {
        const formData = $("#create-form").serialize();
    
        const params = {
            'operacao': 'create',
            'data': formData
        };
    
        $.post('../model/crud-loja.php', params, function(result) {
            console.log(result);
            if(result.status === 1) {
                console.log('Loja criada com sucesso');
                window.location.replace("../../../index.html");
            }else{
                console.log('Erro');
            }
        }, 'json');
        
    }
})