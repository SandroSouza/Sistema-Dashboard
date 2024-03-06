$(document).ready(function(){
    
    $(".btn-delete").click(function () {
        $("#deleteVariationDescriptionModal").css("display", "block");
        let id = $(this).attr("id")
        console.log(id)

        $(".id-variation-description").attr('id', id);
    });

    // Ao clicar no botão de fechar, fechar o modal
    $(".close-modal-delete").click(function () {
        $("#deleteVariationDescriptionModal").css("display", "none");
    });

    // Ao clicar no botão de salvar, chamar a função createCategories
    $(".delete-variation-description-btn").click(function () {

        let id = $("input.id-variation-description").attr("id")

        deleteVariationDescription(id);
        // Fechar o modal após salvar (ajuste conforme necessário)
        $("#deleteVariationDescriptionModal").css("display", "none");
    });

    function deleteVariationDescription(id) {
        const params={
            'operacao': 'delete',
            'data': id
        };
        $.post('../model/crud-variation-description.php', params, function(result) {
            location.reload();
        }, 'json');
        
    }
})