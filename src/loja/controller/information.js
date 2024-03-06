// $(document).ready(function() {
//     function information() {

//         const params = {
//             'operacao': 'information',
//         };

//         $.post('../model/crud-loja.php', params, function(result) {
//             console.log(result);
//             if(result.tipo === 1 && result.status === 1) {
//                 console.log("Loja valida!!!")
//                 $("#nome-loja").append(result.nome)
//                 $("#cor-fundo").append(result.corfundo)
//                 $("#cor-fonte").append(result.corfonte)
//             } else{
//                 window.location.replace("login.html");
//             }
//         }, 'json');
//     }

//     information()
// })