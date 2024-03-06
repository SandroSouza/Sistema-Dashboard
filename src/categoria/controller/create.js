$(document).ready(function(){
    // Ao clicar no botão, exibir o modal
    $("#add-category-btn").click(function () {
        $("#addCategoryModal").css("display", "block");
    });

    // Ao clicar no botão de fechar, fechar o modal
    $("#close-modal").click(function () {
        $("#addCategoryModal").css("display", "none");
    });

    // Ao clicar no botão de salvar, chamar a função createCategories
    $("#save-category-btn").click(function () {
        createCategories();
        // Fechar o modal após salvar (ajuste conforme necessário)
        $("#addCategoryModal").css("display", "none");
    });

    function createCategories() {
        const formData = $("#create-form").serialize();
    
        const params = {
            'operacao': 'create',
            'data': formData
        };
    
        $.post('../model/crud-categoria.php', params, function(result) {
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