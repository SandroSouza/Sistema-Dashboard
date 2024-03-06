$(document).ready(function(){

    function listProduts() {
        const params={
            'operacao': 'list'
        };
        $.post('../model/crud-produto.php', params, function(result) {
        populateTable(result)
        }, 'json');
        
    }
    
    function populateTable(data) {
        const produtList = document.querySelector('.produt-list');
        produtList.innerHTML = '';
    
        data.forEach(produt => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${produt.id}</td>
                <td>${produt.qtde}</td>
                <td>${produt.valor}</td>
                <td>${produt.modelo}</td>
                <td>${produt.idv1}</td>
                <td>${produt.idv2}</td>
                <td>${produt.idloja}</td>
                <td>
                    <button id="${produt.id}" class="btn-edit">
                    <i class="fa-solid fa-pen"></i>
                    </button>
                    <button id="${produt.id}" class="btn-view">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                    <button id="${produt.id}" class="btn-delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            `;
            produtList.appendChild(row);
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
    
    listProduts();
})

