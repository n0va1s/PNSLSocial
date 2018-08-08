<?php

/* cadastroAcao.twig */
class __TwigTemplate_f0d4576e31285857b7f5a0ad7e8a36bb93c32f9680288fed3d07e0aa2ec7f653 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("leiaute.twig", "cadastroAcao.twig", 1);
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
                <h2><span class=\"fa fa-leaf\" aria-hidden=\"true\"></span>&nbsp;Ação</h2>
                <small>ações sociais oferecidas pela instituição</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmTipo\" action=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("acaoSalvar");
        echo "\" method=\"POST\">
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados pessoais</b></legend>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"nome\">Nome</label>
                        <input type=\"text\" id=\"nome\" class=\"form-control\" placeholder=\"Seu nome completo\" autofocus required>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-2 col-sm-offset-1\">
                        <label for=\"genero\" class=\"form-check-label\">Sexo</label><br />
                        <label class=\"form-check-label\">M
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"M\">
                        </label>
                        <label class=\"form-check-label\">F
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"F\">
                        </label>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"estado_civil\" class=\"form-check-label\">Estado Civil</label><br />
                        <select class=\"form-control\" id=\"estado_civil\" required>
                            <option value=\"\">Selecione</option>
                        </select>
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
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados do voluntário</b></legend>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"profissao\">Profissão</label>
                        <input type=\"text\" id=\"profissao\" class=\"form-control\" placeholder=\"Em que vc trabalha\" required>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-3 col-sm-offset-1\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Assinou o termo</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"checkbox\" id=\"assinouTermo\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"checkbox\" id=\"assinouTermo\" class=\"form-check-input\" value=\"N\">
                        </label>
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"conhecimento\">Conhecimentos</label>
                        <textarea class=\"form-control\" id=\"conhecimento\" rows=\"5\"></textarea>
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
        // line 119
        if (array_key_exists("mensagem", $context)) {
            // line 120
            echo "        <div class=\"row alert alert-success\">
            ";
            // line 121
            echo twig_escape_filter($this->env, (isset($context["mensagem"]) || array_key_exists("mensagem", $context) ? $context["mensagem"] : (function () { throw new Twig_Error_Runtime('Variable "mensagem" does not exist.', 121, $this->source); })()), "html", null, true);
            echo "
        </div>
        ";
        }
        // line 124
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "cadastroAcao.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 124,  160 => 121,  157 => 120,  155 => 119,  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'leiaute.twig' %}

{% block conteudo %}
    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <header>
                <h2><span class=\"fa fa-leaf\" aria-hidden=\"true\"></span>&nbsp;Ação</h2>
                <small>ações sociais oferecidas pela instituição</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmTipo\" action=\"{{ path('acaoSalvar')}}\" method=\"POST\">
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados pessoais</b></legend>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"nome\">Nome</label>
                        <input type=\"text\" id=\"nome\" class=\"form-control\" placeholder=\"Seu nome completo\" autofocus required>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-2 col-sm-offset-1\">
                        <label for=\"genero\" class=\"form-check-label\">Sexo</label><br />
                        <label class=\"form-check-label\">M
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"M\">
                        </label>
                        <label class=\"form-check-label\">F
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"F\">
                        </label>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"estado_civil\" class=\"form-check-label\">Estado Civil</label><br />
                        <select class=\"form-control\" id=\"estado_civil\" required>
                            <option value=\"\">Selecione</option>
                        </select>
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
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados do voluntário</b></legend>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"profissao\">Profissão</label>
                        <input type=\"text\" id=\"profissao\" class=\"form-control\" placeholder=\"Em que vc trabalha\" required>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-3 col-sm-offset-1\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Assinou o termo</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"checkbox\" id=\"assinouTermo\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"checkbox\" id=\"assinouTermo\" class=\"form-check-input\" value=\"N\">
                        </label>
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"conhecimento\">Conhecimentos</label>
                        <textarea class=\"form-control\" id=\"conhecimento\" rows=\"5\"></textarea>
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
", "cadastroAcao.twig", "/home/85236250110/Documentos/trabalho/public-html/PNSLSocial/web/view/cadastroAcao.twig");
    }
}
