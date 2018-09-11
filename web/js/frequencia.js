/*$(document).ready(function() {
    $('#acao').change(function(event) {
        event.preventDefault();
        var acao = $('#acao').val();
        var acaoAPI = '/acao/obter/'+acao;
        $.getJSON( acaoAPI, function( acao ) {
            $('#voluntario').val(acao.voluntario.pessoa.nome);
            $('#entrada').val(acao.entrada.date);
            $('#saida').val(acao.saida.date);
            $('#situacao').val(acao.tipo.descricao);
            $('#dia').val(acao.diaSemana.descricao);
            $('#turno').val(acao.turno.descricao);
            $('#inicio').val(acao.inicio.date);
            $('#termino').val(acao.termino.date);
        });
    });
});*/