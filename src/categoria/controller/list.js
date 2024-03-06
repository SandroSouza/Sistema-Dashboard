$(document).ready(function(){

    function listCategories() {
        const params={
            'operacao': 'list'
        };
        $.post('../model/crud-categoria.php', params, function(result) {
        populateTable(result)
        }, 'json');
        
    }
    
    function populateTable(data) {
        const categoryList = document.querySelector('.category-list');
        categoryList.innerHTML = '';
    
        data.forEach(category => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${category.id}</td>
                <td>${category.nome}</td>
                <td>${category.descricao}</td>
                <td>
                    <button id="${category.id}" class="btn-edit">
                    <i class="fa-solid fa-pen"></i>
                    </button>
                    <button id="${category.id}" class="btn-view">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                    <button id="${category.id}" class="btn-delete">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            `;
            categoryList.appendChild(row);
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
    
    listCategories();
})

