$(document).ready(function(){
    $(".btn-view").click(function () {
        $("#viewProdutModal").css("display", "block");

        let id = $(this).attr("id")

        viewProdut(id);

    });

    // Ao clicar no botão de fechar, fechar o modal
    $("#close-modal-view").click(function () {
        $("#viewProdutModal").css("display", "none");
    });

    function viewProdut(id) {
        const params={
            'operacao': 'view',
            'data': id
        };
        $.post('../model/crud-produto.php', params, function(result) {
            console.log(result)
            $('input#qtde').val(result.qtde)
            $('input#valor').val(result.valor)
            $('input#modelo').val(result.modelo)
            $('input#idv1').val(result.idv1)
            $('input#idv2').val(result.idv2)
            $('input#idloja').val(result.idloja)


            $('input#id').val(result.id)
        }, 'json');
    }


})