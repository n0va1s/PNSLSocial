$(document).ready(function() {

    $('#btnPessoa').click(function(event) {
        event.preventDefault();
        var cpf = $('#CPF_pessoa').val();
        var rota = '/admin/usuario/obter/'+cpf;
        $.getJSON( rota, function( pessoa ) {
alert(pessoa.sexo);            
            $('#nome_pessoa').val(pessoa.nome);
            $('#nascimento_pessoa').val(pessoa.dataNascimento.date);
            $('#RG_pessoa').val(pessoa.RG);
            $('#estado_civil_pessoa').val(pessoa.estadoCivil);
            $('#nacionalidade_pessoa').val(pessoa.nacionalidade);
            $('#sexo_pessoa').val(pessoa.sexo);
            $('#profissao_pessoa').val(pessoa.profissao);
            $('#tipo_registro').val(pessoa.tipoPessoa);
            $('#endereco_pessoa').val(pessoa.endereco);
            $('#cidade_pessoa').val(pessoa.cidade);
            $('#UF_pessoa').val(pessoa.UF);
            $('#CEP_pessoa').val(pessoa.CEP);
            $('#telefone_pessoa').val(pessoa.telefone);
            $('#tipo_telefone_pessoa').val(pessoa.tipoTelefone);
            $('#email_pessoa').val(pessoa.email);
        });
    });
});