$(document).ready(function() {

    $('#btnPessoa').click(function(event) {
        event.preventDefault();
        var cpf = $('#CPF_pessoa').val();
        var rota = '/admin/usuario/obter/'+cpf;
        $.getJSON( rota, function( pessoa ) {
            var dia = pessoa.dataNascimento.date.split('-')[2].substr(0,2);
            var mes = pessoa.dataNascimento.date.split('-')[1];
            var ano = pessoa.dataNascimento.date.split('-')[0];
            $('#nome_pessoa').val(pessoa.nome);
            $('#nascimento_pessoa').val(dia+'/'+mes+'/'+ano);
            $('#RG_pessoa').val(pessoa.RG);
            $('#estado_civil_pessoa').val(pessoa.estadoCivil);
            $('#nacionalidade_pessoa').val(pessoa.nacionalidade);
            $('#sexo_pessoa').attr('checked','checked');
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

    $('#btnResponsavel').click(function(event) {
        event.preventDefault();
        var cpf = $('#CPF_responsavel').val();
        var rota = '/admin/usuario/obter/'+cpf;
        $.getJSON( rota, function( pessoa ) {
            var dia = pessoa.dataNascimento.date.split('-')[2].substr(0,2);
            var mes = pessoa.dataNascimento.date.split('-')[1];
            var ano = pessoa.dataNascimento.date.split('-')[0];
            $('#nome_responsavel').val(pessoa.nome);
            $('#nascimento_responsavel').val(dia+'/'+mes+'/'+ano);
            $('#RG_responsavel').val(pessoa.RG);
            $('#estado_civil_responsavel').val(pessoa.estadoCivil);
            $('#nacionalidade_responsavel').val(pessoa.nacionalidade);
            $('#sexo_responsavel').attr('checked','checked');
            $('#profissao_responsavel').val(pessoa.profissao);
            $('#endereco_responsavel').val(pessoa.endereco);
            $('#cidade_responsavel').val(pessoa.cidade);
            $('#UF_responsavel').val(pessoa.UF);
            $('#CEP_responsavel').val(pessoa.CEP);
            $('#telefone_responsavel').val(pessoa.telefone);
            $('#tipo_telefone_responsavel').val(pessoa.tipoTelefone);
            $('#email_responsavel').val(pessoa.email);
        });
    });
});