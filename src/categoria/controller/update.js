$(document).ready(function(){
    
    $(".btn-edit").click(function () {
        $("#editCategoryModal").css("display", "block");

        let id = $(this).attr("id")
        viewCategories(id);

        $("input.id-category").attr('id', id);
    });

    // Ao clicar no botão de fechar, fechar o modal
    $("#close-modal-edit").click(function () {
        $("#editCategoryModal").css("display", "none");
    });

    // Ao clicar no botão de salvar, chamar a função createCategories
    $(".edit-category-btn").click(function (e) {
        e.preventDefault();

        let id = $("input.id-category").attr("id")


        editCategories(id);
        // Fechar o modal após salvar (ajuste conforme necessário)
        $("#addCategoryModal").css("display", "none");
    });

    function viewCategories(id) {
    
        const params = {
            'operacao': 'view',
            'data': id
        };
        $.post('../model/crud-categoria.php', params, function(result) {

            $('input#nome').val(result.nome)
            $('input#descricao').val(result.descricao)


            $('input#id').val(result.id)
        }, 'json');
    }

    function editCategories(id) {
        const formData = $("#edit-form").serialize();

        const params = {
            'operacao': 'update',
            'data': formData,
            'id': id
        };
    
        $.post('../model/crud-categoria.php', params, function(result) {
            location.reload();
            if(result.status === 1) {
                console.log('Categoria atualizada com sucesso');
            }else{
                console.log('Erro');
            }
        }, 'json');
        
    }
})