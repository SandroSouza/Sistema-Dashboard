$(document).ready(function(){
    
    $(".btn-edit").click(function () {
        $("#editProdutModal").css("display", "block");

        let id = $(this).attr("id")
        viewProdut(id);

        $("input.id-produt").attr('id', id);
    });

    // Ao clicar no botão de fechar, fechar o modal
    $("#close-modal-edit").click(function () {
        $("#editProdutModal").css("display", "none");
    });

    // Ao clicar no botão de salvar, chamar a função createCategories
    $(".edit-produt-btn").click(function (e) {
        e.preventDefault();

        let id = $("input.id-produt").attr("id")


        editProdut(id);
        // Fechar o modal após salvar (ajuste conforme necessário)
        $("#addProdutModal").css("display", "none");
    });

    function viewProdut(id) {
    
        const params = {
            'operacao': 'view',
            'data': id
        };
        $.post('../model/crud-produto.php', params, function(result) {

            $('input#qtde').val(result.qtde)
            $('input#valor').val(result.valor)
            $('input#modelo').val(result.modelo)
            $('input#idv1').val(result.idv1)
            $('input#idv2').val(result.idv2)
            $('input#idloja').val(result.idloja)


            $('input#id').val(result.id)
        }, 'json');
    }

    function editProdut(id) {
        const formData = $("#edit-form").serialize();
        const params = {
            'operacao': 'update',
            'data': formData,
            'id': id
        };
    
        $.post('../model/crud-produto.php', params, function(result) {
            location.reload();
            if(result.status === 1) {
                console.log('Produto atualizado com sucesso');
            }else{
                console.log('Erro');
            }
        }, 'json');
        
    }
})