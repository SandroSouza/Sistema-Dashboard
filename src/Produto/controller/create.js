$(document).ready(function(){
    // Ao clicar no botão, exibir o modal
    $("#add-produt-btn").click(function () {
        $("#addProdutModal").css("display", "block");
    });

    // Ao clicar no botão de fechar, fechar o modal
    $("#close-modal").click(function () {
        $("#addProdutModal").css("display", "none");
    });

    // Ao clicar no botão de salvar, chamar a função createCategories
    $("#save-produt-btn").click(function () {
        createProdut();
        // Fechar o modal após salvar (ajuste conforme necessário)
        $("#addProdutModal").css("display", "none");
    });

    function createProdut() {
        const formData = $("#create-form").serialize();
        const params = {
            'operacao': 'create',
            'data': formData
        };
    
        $.post('../model/crud-produto.php', params, function(result) {
            console.log(result);
            location.reload();
            if(result.status === 1) {
                console.log('Produto criado com sucesso');
            }else{
                console.log('Erro');
            }
        }, 'json');
        
    }

    // const select = $(".dynamicSelect");
    // const form = $(".form-group");
    // select.empty(); // Limpa opções existentes

    // function loadValues() {

    //     const params = {
    //         'operacao': 'list',
    //     };

    //     $.post('../../variacao-descricao/model/crud-variation-description.php', params, function(result) {
    //         result.forEach(function(value) {
    //             select.append(`<option value="${value.id}">${value.descricao}</option>`);
    //             form.append(`<input type="hidden" name="variacao-descricao" value="${value.id}" />`)
    //         });
    //     }, 'json');
    // }

    // loadValues();
})