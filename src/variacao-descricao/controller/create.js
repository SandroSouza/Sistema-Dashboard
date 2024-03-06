$(document).ready(function(){
    // Ao clicar no botão, exibir o modal
    $("#add-variation-description-btn").click(function () {
        $("#addVariationDescriptionModal").css("display", "block");
    });

    // Ao clicar no botão de fechar, fechar o modal
    $("#close-modal").click(function () {
        $("#addVariationDescriptionModal").css("display", "none");
    });

    // Ao clicar no botão de salvar, chamar a função createCategories
    $("#save-variation-description-btn").click(function () {
        createVariationDescription();
        // Fechar o modal após salvar (ajuste conforme necessário)
        $("#addVariationDescriptionModal").css("display", "none");
    });

    function createVariationDescription() {
        const formData = $("#create-form").serialize();
    
        const params = {
            'operacao': 'create',
            'data': formData
        };
    
        $.post('../model/crud-variation-description.php', params, function(result) {
            console.log(result);
            location.reload();
            if(result.status === 1) {
                console.log('Categoria criada com sucesso');
            }else{
                console.log('Erro');
            }
        }, 'json');
        
    }
})