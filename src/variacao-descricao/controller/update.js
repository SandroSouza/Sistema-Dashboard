$(document).ready(function(){
    
    $(".btn-edit").click(function () {
        $("#editVariationDescriptionModal").css("display", "block");

        let id = $(this).attr("id")
        viewVariationDescription(id);

        $("input.id-variation-description").attr('id', id);
    });

    // Ao clicar no botão de fechar, fechar o modal
    $("#close-modal-edit").click(function () {
        $("#editVariationDescriptionModal").css("display", "none");
    });

    $(".edit-variation-description-btn").click(function () {

        let id = $("input.id-variation-description").attr("id")


        editVariationDescription(id);
        // Fechar o modal após salvar (ajuste conforme necessário)
        $("#editVariationDescriptionModal").css("display", "none");
    });

    function viewVariationDescription(id) {
    
        const params = {
            'operacao': 'view',
            'data': id
        };
        $.post('../model/crud-variation-description.php', params, function(result) {
            $('input#descricao').val(result.descricao)


            $('input#id').val(result.id)
        }, 'json');
    }

    function editVariationDescription(id) {
        const formData = $("#edit-form").serialize();

        const params = {
            'operacao': 'update',
            'data': formData,
            'id': id
        };
    
        $.post('../model/crud-variation-description.php', params, function(result) {
            location.reload();
            if(result.status === 1) {
                console.log('Variação atualizada com sucesso');
            }else{
                console.log('Erro');
            }
        }, 'json');
        
    }
})