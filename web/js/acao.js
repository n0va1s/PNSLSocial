$(document).ready(function() {
    $('#btnAdicionar').click(function(event) {
        event.preventDefault();
        var usuario = $('#usuario').val();
        var acao = $('#id').val();
        $.ajax({
            url: '/acao/usuario',
            method: 'POST',
            data: {acao: acao, usuario: usuario},
            success: function () {
                alert ('Usuário incluído com sucesso!');
                console.log('OK. Usuario cadastrado incluido na turma');
            },
            error: function () {
                alert ('Serviço indisponível... avise quem desenvolveu o sistema.');
                console.log('NOK. Erro ao incluir o usuario na turma');
            }
        });
    });
});