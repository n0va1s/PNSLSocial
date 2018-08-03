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
                <h2><span class=\"fa fa-user\" aria-hidden=\"true\"></span>&nbsp;Menor</h2>
                <small>jovens atendidos pela casa</small>
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
                            <input type=\"checkbox\" id=\"genero\" class=\"form-check-input\" value=\"M\">
                        </label>
                        <label class=\"form-check-label\">Feminino
                            <input type=\"checkbox\" id=\"genero\" class=\"form-check-input\" value=\"F\">
                        </label>
                    </div>
                    <div class=\"clearfix\">&nbsp;</div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"dataNascimento\">Nascimento</label>
                        <input type=\"date\" id=\"dataNascimento\" class=\"form-control\" placeholder=\"dd/mm/aaa\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"numRG\">RG</label>
                        <input type=\"number\" id=\"numRG\" class=\"form-control\" placeholder=\"9999999\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"numCPF\">CPF</label>
                        <input type=\"number\" id=\"numCPF\" class=\"form-control\" placeholder=\"999.999.999-99\" required>
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"naturalidade\">Naturalidade</label>
                        <input type=\"text\" id=\"naturalidade\" class=\"form-control\" placeholder=\"Brasília\" required>
                    </div>
                </fieldset>
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados do menor</b></legend>
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
                    <div class=\"form-group\">
                        <label for=\"responsavel\">Responsável</label>
                        <input type=\"text\" id=\"responsavel\" class=\"form-control\" placeholder=\"Pesquise o nome do responsável\" required>
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
        // line 91
        if (array_key_exists("mensagem", $context)) {
            // line 92
            echo "        <div class=\"row alert alert-success\">
            ";
            // line 93
            echo twig_escape_filter($this->env, (isset($context["mensagem"]) || array_key_exists("mensagem", $context) ? $context["mensagem"] : (function () { throw new Twig_Error_Runtime('Variable "mensagem" does not exist.', 93, $this->source); })()), "html", null, true);
            echo "
        </div>
        ";
        }
        // line 96
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
        return array (  138 => 96,  132 => 93,  129 => 92,  127 => 91,  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'leiaute.twig' %}

{% block conteudo %}
    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <header>
                <h2><span class=\"fa fa-user\" aria-hidden=\"true\"></span>&nbsp;Menor</h2>
                <small>jovens atendidos pela casa</small>
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
                            <input type=\"checkbox\" id=\"genero\" class=\"form-check-input\" value=\"M\">
                        </label>
                        <label class=\"form-check-label\">Feminino
                            <input type=\"checkbox\" id=\"genero\" class=\"form-check-input\" value=\"F\">
                        </label>
                    </div>
                    <div class=\"clearfix\">&nbsp;</div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"dataNascimento\">Nascimento</label>
                        <input type=\"date\" id=\"dataNascimento\" class=\"form-control\" placeholder=\"dd/mm/aaa\" required>
                    </div>
                    <div class=\"form-group col-sm-2\">
                        <label for=\"numRG\">RG</label>
                        <input type=\"number\" id=\"numRG\" class=\"form-control\" placeholder=\"9999999\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"numCPF\">CPF</label>
                        <input type=\"number\" id=\"numCPF\" class=\"form-control\" placeholder=\"999.999.999-99\" required>
                    </div>
                    <div class=\"form-group col-sm-4\">
                        <label for=\"naturalidade\">Naturalidade</label>
                        <input type=\"text\" id=\"naturalidade\" class=\"form-control\" placeholder=\"Brasília\" required>
                    </div>
                </fieldset>
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados do menor</b></legend>
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
                    <div class=\"form-group\">
                        <label for=\"responsavel\">Responsável</label>
                        <input type=\"text\" id=\"responsavel\" class=\"form-control\" placeholder=\"Pesquise o nome do responsável\" required>
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
