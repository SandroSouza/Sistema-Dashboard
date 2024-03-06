$(document).ready(function(){
    $(".btn-view").click(function () {
        $("#viewCategoryModal").css("display", "block");

        let id = $(this).attr("id")

        viewCategories(id);

    });

    // Ao clicar no botão de fechar, fechar o modal
    $("#close-modal-view").click(function () {
        $("#viewCategoryModal").css("display", "none");
    });

    function viewCategories(id) {
        const params={
            'operacao': 'view',
            'data': id
        };
        $.post('../model/crud-categoria.php', params, function(result) {
            console.log(result)
            $('input#nome').val(result.nome)
            $('input#descricao').val(result.descricao)


            $('input#id').val(result.id)
        }, 'json');
    }


})