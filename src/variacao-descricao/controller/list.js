$(document).ready(function(){
    function listVariationDescription() {
        const params={
            'operacao': 'list'
        };
        $.post('../model/crud-variation-description.php', params, function(result) {
        populateTable(result)
        }, 'json');
        
    }
    
    function populateTable(data) {
        const variationDescriptionList = document.querySelector('.variation-list');
        variationDescriptionList.innerHTML = '';
    
        data.forEach(variation => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${variation.id}</td>
                <td>${variation.descricao}</td>
                <td>
                    <button id="${variation.id}" class="btn-edit">
                    <i class="fa-solid fa-pen"></i>
                    </button>
                    <button id="${variation.id}" class="btn-view">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                    <button id="${variation.id}" class="btn-delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            `;
            variationDescriptionList.appendChild(row);
        });

        var view = document.createElement('script');
        view.type='text/javascript';
        view.src='../controller/view.js'
        

        var update = document.createElement('script');
        update.type='text/javascript';
        update.src='../controller/update.js'
        

        var excluir = document.createElement('script');
        excluir.type='text/javascript';
        excluir.src='../controller/delete.js'
        
        $("body").append(excluir);
        $("body").append(update);
        $("body").append(view);
    }
    
    listVariationDescription();
})

