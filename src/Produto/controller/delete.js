$(document).ready(function(){
    
    $(".btn-delete").click(function () {
        $("#deleteProdutModal").css("display", "block");
        let id = $(this).attr("id")
        // console.log(id)

        $(".id-produt").attr('id', id);
    });

    // Ao clicar no botão de fechar, fechar o modal
    $(".close-modal-delete").click(function () {
        $("#deleteProdutModal").css("display", "none");
    });

    // Ao clicar no botão de salvar, chamar a função createCategories
    $(".delete-produt-btn").click(function () {

        let id = $("input.id-produt").attr("id")

        deleteProduts(id);
        // Fechar o modal após salvar (ajuste conforme necessário)
        $("#addProdutModal").css("display", "none");
    });

    function deleteProduts(id) {
        const params={
            'operacao': 'delete',
            'data': id
        };
        $.post('../model/crud-produto.php', params, function(result) {
            location.reload();
        }, 'json');
        
    }
})