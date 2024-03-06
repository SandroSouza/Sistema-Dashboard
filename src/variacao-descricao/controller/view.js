$(document).ready(function(){
    $(".btn-view").click(function () {
        $("#viewVariationDescriptionModal").css("display", "block");

        let id = $(this).attr("id")

        viewVariationDescription(id);

    });

    // Ao clicar no botão de fechar, fechar o modal
    $("#close-modal-view").click(function () {
        $("#viewVariationDescriptionModal").css("display", "none");
    });

    function viewVariationDescription(id) {
        const params={
            'operacao': 'view',
            'data': id
        };
        $.post('../model/crud-variation-description.php', params, function(result) {
            console.log(result)
            $('input#descricao').val(result.descricao)


            $('input#id').val(result.id)
        }, 'json');
    }


})