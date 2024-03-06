$(document).ready(function(){
    
    $(".btn-delete").click(function () {
        $("#deleteCategoryModal").css("display", "block");
        let id = $(this).attr("id")
        console.log(id)

        $(".id-category").attr('id', id);
    });

    // Ao clicar no botão de fechar, fechar o modal
    $(".close-modal-delete").click(function () {
        $("#deleteCategoryModal").css("display", "none");
    });

    // Ao clicar no botão de salvar, chamar a função createCategories
    $(".delete-category-btn").click(function () {

        let id = $("input.id-category").attr("id")

        deleteCategories(id);
        // Fechar o modal após salvar (ajuste conforme necessário)
        $("#addCategoryModal").css("display", "none");
    });

    function deleteCategories(id) {
        const params={
            'operacao': 'delete',
            'data': id
        };
        $.post('../model/crud-categoria.php', params, function(result) {
            location.reload();
        }, 'json');
        
    }
})