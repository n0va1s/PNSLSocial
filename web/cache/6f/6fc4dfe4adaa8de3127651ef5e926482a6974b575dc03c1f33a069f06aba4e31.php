<?php

/* cadastroVoluntario.twig */
class __TwigTemplate_855f6e6247118f1cb62f5bfeeb5e5f06c6831d1cac3ab63176a380359b7e96e6 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("leiaute.twig", "cadastroVoluntario.twig", 1);
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
                <h2><span class=\"fa fa-vcard-o\" aria-hidden=\"true\"></span>&nbsp;Voluntário</h2>
                <small>pessoas que prestam o serviço social</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmCadastro\" action=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("voluntarioSalvar");
        echo "\" method=\"POST\">
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados pessoais</b></legend>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"numCPF\">CPF</label>
                        <input type=\"number\" id=\"numCPF\" class=\"form-control\" placeholder=\"999.999.999-99\">
                    </div>
                    <div class=\"form-group col-sm-9\">
                        <label for=\"nome\">Nome</label>
                        <input type=\"text\" id=\"nome\" class=\"form-control\" placeholder=\"Seu nome completo\" autofocus required>
                    </div>
                    <div class=\"clearfix\"></div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"dataNascimento\">Nascimento</label>
                        <input type=\"date\" id=\"dataNascimento\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"numRG\">RG</label>
                        <input type=\"number\" id=\"numRG\" class=\"form-control\" placeholder=\"9.999.999\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"estado_civil\" class=\"form-check-label\">Estado Civil</label><br />
                        <select class=\"form-control\" id=\"estado_civil\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"nacionalidade\">Nacionalidade</label>
                        <input type=\"text\" id=\"naturalidade\" class=\"form-control\" placeholder=\"Brasíleira\" required>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-2\">
                        <label for=\"genero\" class=\"form-check-label\">Sexo</label><br />
                        <label class=\"form-check-label\">M
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"M\">
                        </label>
                        <label class=\"form-check-label\">F
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"F\">
                        </label>
                    </div>                    
                    <div class=\"form-group col-sm-7\">
                        <label for=\"profissao\">Profissão</label>
                        <input type=\"text\" id=\"profissao\" class=\"form-control\" placeholder=\"Costureira\">
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"nis\">NIS</label>
                        <input type=\"number\" id=\"nis\" class=\"form-control\" placeholder=\"999999999999\">
                    </div>
                </fieldset>
                <fieldset>
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
                <fieldset>
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
                    <div class=\"form-group col-sm-8\">
                        <label for=\"conhecimento\">Conhecimentos</label>
                        <textarea class=\"form-control\" id=\"conhecimento\" rows=\"5\" placeholder=\"Fazer bolos, tirar leite, contabilidade, corrida de rua\"></textarea>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-3 col-sm-offset-1\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Assinou o termo</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"radio\" id=\"assinouTermo\" name=\"assinouTermo\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"radio\" id=\"assinouTermo\" name=\"assinouTermo\" class=\"form-check-input\" value=\"N\" checked=\"true\">
                        </label>
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
        // line 126
        if (array_key_exists("mensagem", $context)) {
            // line 127
            echo "        <div class=\"row alert alert-success\">
            ";
            // line 128
            echo twig_escape_filter($this->env, (isset($context["mensagem"]) || array_key_exists("mensagem", $context) ? $context["mensagem"] : (function () { throw new Twig_Error_Runtime('Variable "mensagem" does not exist.', 128, $this->source); })()), "html", null, true);
            echo "
        </div>
        ";
        }
        // line 131
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "cadastroVoluntario.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 131,  167 => 128,  164 => 127,  162 => 126,  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'leiaute.twig' %}

{% block conteudo %}
    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <header>
                <h2><span class=\"fa fa-vcard-o\" aria-hidden=\"true\"></span>&nbsp;Voluntário</h2>
                <small>pessoas que prestam o serviço social</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmCadastro\" action=\"{{ path('voluntarioSalvar')}}\" method=\"POST\">
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados pessoais</b></legend>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"numCPF\">CPF</label>
                        <input type=\"number\" id=\"numCPF\" class=\"form-control\" placeholder=\"999.999.999-99\">
                    </div>
                    <div class=\"form-group col-sm-9\">
                        <label for=\"nome\">Nome</label>
                        <input type=\"text\" id=\"nome\" class=\"form-control\" placeholder=\"Seu nome completo\" autofocus required>
                    </div>
                    <div class=\"clearfix\"></div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"dataNascimento\">Nascimento</label>
                        <input type=\"date\" id=\"dataNascimento\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"numRG\">RG</label>
                        <input type=\"number\" id=\"numRG\" class=\"form-control\" placeholder=\"9.999.999\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"estado_civil\" class=\"form-check-label\">Estado Civil</label><br />
                        <select class=\"form-control\" id=\"estado_civil\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"nacionalidade\">Nacionalidade</label>
                        <input type=\"text\" id=\"naturalidade\" class=\"form-control\" placeholder=\"Brasíleira\" required>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-2\">
                        <label for=\"genero\" class=\"form-check-label\">Sexo</label><br />
                        <label class=\"form-check-label\">M
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"M\">
                        </label>
                        <label class=\"form-check-label\">F
                            <input type=\"radio\" id=\"genero\" name=\"genero\" class=\"form-check-input\" value=\"F\">
                        </label>
                    </div>                    
                    <div class=\"form-group col-sm-7\">
                        <label for=\"profissao\">Profissão</label>
                        <input type=\"text\" id=\"profissao\" class=\"form-control\" placeholder=\"Costureira\">
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"nis\">NIS</label>
                        <input type=\"number\" id=\"nis\" class=\"form-control\" placeholder=\"999999999999\">
                    </div>
                </fieldset>
                <fieldset>
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
                <fieldset>
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
                    <div class=\"form-group col-sm-8\">
                        <label for=\"conhecimento\">Conhecimentos</label>
                        <textarea class=\"form-control\" id=\"conhecimento\" rows=\"5\" placeholder=\"Fazer bolos, tirar leite, contabilidade, corrida de rua\"></textarea>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-3 col-sm-offset-1\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Assinou o termo</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"radio\" id=\"assinouTermo\" name=\"assinouTermo\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"radio\" id=\"assinouTermo\" name=\"assinouTermo\" class=\"form-check-input\" value=\"N\" checked=\"true\">
                        </label>
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
", "cadastroVoluntario.twig", "/var/www/html/PNSLSocial/web/view/cadastroVoluntario.twig");
    }
}
