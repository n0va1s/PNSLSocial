<?php

/* cadastroMenor.twig */
class __TwigTemplate_bacf0934841b9b27d165c07246eddbc2413d01f8537d04973eeb56ae0a22cba1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("leiaute.twig", "cadastroMenor.twig", 1);
        $this->blocks = array(
            'conteudo' => array($this, 'block_conteudo'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "leiaute.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_conteudo($context, array $blocks = array())
    {
        // line 4
        echo "    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <header>
                <h2><span class=\"fa fa-user\" aria-hidden=\"true\"></span>&nbsp;Usuários</h2>
                <small>pessoas atendidas pela casa</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmTipo\" action=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("menorSalvar");
        echo "\" method=\"POST\">
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados pessoais</b></legend>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"nome\">Nome</label>
                        <input type=\"text\" id=\"nome\" class=\"form-control\" placeholder=\"Seu nome completo\" autofocus required>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-5 col-sm-offset-1\">
                        <label for=\"genero\" class=\"form-check-label\">Sexo</label><br />
                        <label class=\"form-check-label\">Masculino
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"M\">
                        </label>
                        <label class=\"form-check-label\">Feminino
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"F\">
                        </label>
                    </div>
                    <div class=\"clearfix\">&nbsp;</div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"dataNascimento\">Nascimento</label>
                        <input type=\"date\" id=\"dataNascimento\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"numRG\">RG</label>
                        <input type=\"number\" id=\"numRG\" class=\"form-control\" placeholder=\"9.999.999\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"numCPF\">CPF</label>
                        <input type=\"number\" id=\"numCPF\" class=\"form-control\" placeholder=\"999.999.999-99\">
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"nacionalidade\">Nacionalidade</label>
                        <input type=\"text\" id=\"naturalidade\" class=\"form-control\" placeholder=\"Brasíleira\" required>
                    </div>
                </fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Endereço</b></legend>
                    <div class=\"form-group col-sm-5\">
                        <label for=\"endereco\">Endereço</label>
                        <input type=\"text\" id=\"endereco\" class=\"form-control\" placeholder=\"SQN 915 Bloco A Apt 108\" required>
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"cidade\">Cidade</label>
                        <input type=\"text\" id=\"cidade\" class=\"form-control\" placeholder=\"Asa Norte\" required>
                    </div>
                    <div class=\"form-group col-sm-1\">
                        <label for=\"uf\">UF</label>
                        <select class=\"form-control\" id=\"uf\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"cep\">CEP</label>
                        <input type=\"number\" id=\"cep\" class=\"form-control\" placeholder=\"70000000\">
                    </div>
                </fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Contato</b></legend>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"telefone\">Telefone</label>
                        <input type=\"text\" id=\"telefone\" class=\"form-control\" placeholder=\"61999998888\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"tipo_telefone\">Tipo</label>
                        <select class=\"form-control\" id=\"tipo_telefone\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"email\">Email</label>
                        <input type=\"email\" id=\"email\" class=\"form-control\" placeholder=\"xxx@email.com\">
                    </div>
                </fieldset>
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados da família</b></legend>
                    <div class=\"form-group col-sm-8\">
                        <label for=\"responsavel\">Responsável</label>
                        <input type=\"text\" id=\"responsavel\" class=\"form-control\" placeholder=\"Nome do responsável\">
                    </div>
                    <div class=\"form-group form-check-inline col-sm-4\">
                        <label for=\"tipo_telefone\">Parentesco</label>
                        <select class=\"form-control\" id=\"tipo_telefone\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"telefone\">Telefone</label>
                        <input type=\"number\" id=\"telefone\" class=\"form-control\" placeholder=\"61999998888\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"tipo_telefone\">Tipo</label>
                        <select class=\"form-control\" id=\"tipo_telefone\">
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"email\">Email</label>
                        <input type=\"email\" id=\"email\" class=\"form-control\" placeholder=\"xxx@email.com\">
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"dataNascimento\">Nascimento</label>
                        <input type=\"date\" id=\"dataNascimento\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"numRG\">RG</label>
                        <input type=\"number\" id=\"numRG\" class=\"form-control\" placeholder=\"9.999.999\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"numCPF\">CPF</label>
                        <input type=\"number\" id=\"numCPF\" class=\"form-control\" placeholder=\"999.999.999-99\">
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"nacionalidade\">Nacionalidade</label>
                        <input type=\"text\" id=\"nacionalidade\" class=\"form-control\" placeholder=\"Brasíleira\" required>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"endereco\">Endereço</label>
                        <input type=\"text\" id=\"endereco\" class=\"form-control\" placeholder=\"SQN 915 Bloco A Apt 108\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"cidade\">Cidade</label>
                        <input type=\"text\" id=\"cidade\" class=\"form-control\" placeholder=\"Asa Norte\" required>
                    </div>
                    <div class=\"form-group col-sm-1\">
                        <label for=\"uf\">UF</label>
                        <select class=\"form-control\" id=\"uf\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"cep\">CEP</label>
                        <input type=\"number\" id=\"cep\" class=\"form-control\" placeholder=\"70000000\">
                    </div>
                     <div class=\"form-group form-check-inline col-sm-3\">
                        <label for=\"trabalha\" class=\"form-check-label\">Trabalha</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"radio\" id=\"trabalha\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"radio\" id=\"trabalha\" class=\"form-check-input\" value=\"N\">
                        </label>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"profissao\">Profissão</label>
                        <input type=\"text\" id=\"profissao\" class=\"form-control\" placeholder=\"Costureira\">
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"nis\">NIS</label>
                        <input type=\"number\" id=\"nis\" class=\"form-control\" placeholder=\"999999999999\">
                    </div>
                </fieldset>
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados escolares</b></legend>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"escola\">Escola</label>
                        <input type=\"text\" id=\"escola\" class=\"form-control\" placeholder=\"Nome da escola\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"ano\">Ano</label>
                        <input type=\"number\" id=\"ano\" class=\"form-control\" placeholder=\"9999\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"turno\">Turno</label>
                        <select class=\"form-control\" id=\"turno\">
                            <option value=\"\">Selecione</option>
                            <option value=\"M\">Matutino</option>
                            <option value=\"V\">Vespertino</option>
                            <option value=\"N\">Noturno</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"grau\">Grau</label>
                        <select class=\"form-control\" id=\"grau\">
                            <option value=\"\">Selecione</option>
                            <option value=\"1\">1º</option>
                            <option value=\"2\">2º</option>
                            <option value=\"3\">3º</option>
                        </select>
                    </div>
                </fieldset>
                <div class=\"form-group col-sm-12 text-center\">
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"glyphicon glyphicon-ok\"> Cadastrar</i>
                    </button>
                    <button type=\"button\" class=\"btn btn-default\">
                        <i class=\"glyphicon glyphicon-remove\"> Limpar</i>
                    </button>
                </div>
                <input type=\"hidden\" id=\"tipo\" value=\"VOL\">
            </form>
        </div>
        ";
        // line 201
        if (array_key_exists("mensagem", $context)) {
            // line 202
            echo "        <div class=\"row alert alert-success\">
            ";
            // line 203
            echo twig_escape_filter($this->env, (isset($context["mensagem"]) || array_key_exists("mensagem", $context) ? $context["mensagem"] : (function () { throw new Twig_Error_Runtime('Variable "mensagem" does not exist.', 203, $this->source); })()), "html", null, true);
            echo "
        </div>
        ";
        }
        // line 206
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "cadastroMenor.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 206,  242 => 203,  239 => 202,  237 => 201,  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'leiaute.twig' %}

{% block conteudo %}
    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <header>
                <h2><span class=\"fa fa-user\" aria-hidden=\"true\"></span>&nbsp;Usuários</h2>
                <small>pessoas atendidas pela casa</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmTipo\" action=\"{{ path('menorSalvar')}}\" method=\"POST\">
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados pessoais</b></legend>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"nome\">Nome</label>
                        <input type=\"text\" id=\"nome\" class=\"form-control\" placeholder=\"Seu nome completo\" autofocus required>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-5 col-sm-offset-1\">
                        <label for=\"genero\" class=\"form-check-label\">Sexo</label><br />
                        <label class=\"form-check-label\">Masculino
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"M\">
                        </label>
                        <label class=\"form-check-label\">Feminino
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"F\">
                        </label>
                    </div>
                    <div class=\"clearfix\">&nbsp;</div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"dataNascimento\">Nascimento</label>
                        <input type=\"date\" id=\"dataNascimento\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"numRG\">RG</label>
                        <input type=\"number\" id=\"numRG\" class=\"form-control\" placeholder=\"9.999.999\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"numCPF\">CPF</label>
                        <input type=\"number\" id=\"numCPF\" class=\"form-control\" placeholder=\"999.999.999-99\">
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"nacionalidade\">Nacionalidade</label>
                        <input type=\"text\" id=\"naturalidade\" class=\"form-control\" placeholder=\"Brasíleira\" required>
                    </div>
                </fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Endereço</b></legend>
                    <div class=\"form-group col-sm-5\">
                        <label for=\"endereco\">Endereço</label>
                        <input type=\"text\" id=\"endereco\" class=\"form-control\" placeholder=\"SQN 915 Bloco A Apt 108\" required>
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"cidade\">Cidade</label>
                        <input type=\"text\" id=\"cidade\" class=\"form-control\" placeholder=\"Asa Norte\" required>
                    </div>
                    <div class=\"form-group col-sm-1\">
                        <label for=\"uf\">UF</label>
                        <select class=\"form-control\" id=\"uf\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"cep\">CEP</label>
                        <input type=\"number\" id=\"cep\" class=\"form-control\" placeholder=\"70000000\">
                    </div>
                </fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Contato</b></legend>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"telefone\">Telefone</label>
                        <input type=\"text\" id=\"telefone\" class=\"form-control\" placeholder=\"61999998888\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"tipo_telefone\">Tipo</label>
                        <select class=\"form-control\" id=\"tipo_telefone\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"email\">Email</label>
                        <input type=\"email\" id=\"email\" class=\"form-control\" placeholder=\"xxx@email.com\">
                    </div>
                </fieldset>
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados da família</b></legend>
                    <div class=\"form-group col-sm-8\">
                        <label for=\"responsavel\">Responsável</label>
                        <input type=\"text\" id=\"responsavel\" class=\"form-control\" placeholder=\"Nome do responsável\">
                    </div>
                    <div class=\"form-group form-check-inline col-sm-4\">
                        <label for=\"tipo_telefone\">Parentesco</label>
                        <select class=\"form-control\" id=\"tipo_telefone\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"telefone\">Telefone</label>
                        <input type=\"number\" id=\"telefone\" class=\"form-control\" placeholder=\"61999998888\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"tipo_telefone\">Tipo</label>
                        <select class=\"form-control\" id=\"tipo_telefone\">
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"email\">Email</label>
                        <input type=\"email\" id=\"email\" class=\"form-control\" placeholder=\"xxx@email.com\">
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"dataNascimento\">Nascimento</label>
                        <input type=\"date\" id=\"dataNascimento\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"numRG\">RG</label>
                        <input type=\"number\" id=\"numRG\" class=\"form-control\" placeholder=\"9.999.999\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"numCPF\">CPF</label>
                        <input type=\"number\" id=\"numCPF\" class=\"form-control\" placeholder=\"999.999.999-99\">
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"nacionalidade\">Nacionalidade</label>
                        <input type=\"text\" id=\"nacionalidade\" class=\"form-control\" placeholder=\"Brasíleira\" required>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"endereco\">Endereço</label>
                        <input type=\"text\" id=\"endereco\" class=\"form-control\" placeholder=\"SQN 915 Bloco A Apt 108\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"cidade\">Cidade</label>
                        <input type=\"text\" id=\"cidade\" class=\"form-control\" placeholder=\"Asa Norte\" required>
                    </div>
                    <div class=\"form-group col-sm-1\">
                        <label for=\"uf\">UF</label>
                        <select class=\"form-control\" id=\"uf\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"cep\">CEP</label>
                        <input type=\"number\" id=\"cep\" class=\"form-control\" placeholder=\"70000000\">
                    </div>
                     <div class=\"form-group form-check-inline col-sm-3\">
                        <label for=\"trabalha\" class=\"form-check-label\">Trabalha</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"radio\" id=\"trabalha\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"radio\" id=\"trabalha\" class=\"form-check-input\" value=\"N\">
                        </label>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"profissao\">Profissão</label>
                        <input type=\"text\" id=\"profissao\" class=\"form-control\" placeholder=\"Costureira\">
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"nis\">NIS</label>
                        <input type=\"number\" id=\"nis\" class=\"form-control\" placeholder=\"999999999999\">
                    </div>
                </fieldset>
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados escolares</b></legend>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"escola\">Escola</label>
                        <input type=\"text\" id=\"escola\" class=\"form-control\" placeholder=\"Nome da escola\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"ano\">Ano</label>
                        <input type=\"number\" id=\"ano\" class=\"form-control\" placeholder=\"9999\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"turno\">Turno</label>
                        <select class=\"form-control\" id=\"turno\">
                            <option value=\"\">Selecione</option>
                            <option value=\"M\">Matutino</option>
                            <option value=\"V\">Vespertino</option>
                            <option value=\"N\">Noturno</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"grau\">Grau</label>
                        <select class=\"form-control\" id=\"grau\">
                            <option value=\"\">Selecione</option>
                            <option value=\"1\">1º</option>
                            <option value=\"2\">2º</option>
                            <option value=\"3\">3º</option>
                        </select>
                    </div>
                </fieldset>
                <div class=\"form-group col-sm-12 text-center\">
                    <button type=\"submit\" class=\"btn btn-primary\">
                        <i class=\"glyphicon glyphicon-ok\"> Cadastrar</i>
                    </button>
                    <button type=\"button\" class=\"btn btn-default\">
                        <i class=\"glyphicon glyphicon-remove\"> Limpar</i>
                    </button>
                </div>
                <input type=\"hidden\" id=\"tipo\" value=\"VOL\">
            </form>
        </div>
        {% if mensagem is defined %}
        <div class=\"row alert alert-success\">
            {{ mensagem }}
        </div>
        {% endif %}
    </div>
{% endblock %}
", "cadastroMenor.twig", "/home/85236250110/Documentos/trabalho/public-html/PNSLSocial/web/view/cadastroMenor.twig");
    }
}