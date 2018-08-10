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
                <h2><span class=\"fa fa-leaf\" aria-hidden=\"true\"></span>&nbsp;Ação social</h2>
                <small>ações sociais oferecidas pela instituição</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmCadastro\" action=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("acaoSalvar");
        echo "\" method=\"POST\">
                <div class=\"form-group form-check-inline\">
                    <label class=\"form-check-label\">Atendimento
                        <input type=\"radio\" id=\"tipo_acao\" name=\"tipo_acao\" class=\"form-check-input\" value=\"A\" checked=\"true\">
                    </label>
                    <label class=\"form-check-label\">Turma
                        <input type=\"radio\" id=\"tipo_acao\" name=\"tipo_acao\" class=\"form-check-input\" value=\"T\">
                    </label>
                </div>
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados básicos</b></legend>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"nome\">Nome</label>
                        <input type=\"text\" id=\"nome\" class=\"form-control\" placeholder=\"O nome da ação social\" autofocus required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"inicio\">Início</label>
                        <input type=\"date\" id=\"inicio\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"termino\">Término</label>
                        <input type=\"date\" id=\"termino\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"publico-alvo\">Público-alvo</label>
                        <input type=\"text\" id=\"publico-alvo\" class=\"form-control\" placeholder=\"adolescentes, maiores de 12 anos e de ambos os sexos\">
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"pre-requisito\">Pré-requisito</label>
                        <input type=\"text\" id=\"pre-requisito\" class=\"form-control\" placeholder=\"estar na 4ª série, ter feito informática básica\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"voluntario\">Voluntário</label>
                        <select class=\"form-control\" id=\"voluntario\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset disabled>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Usuários</b></legend>
                    <div class=\"form-group\">
                        <select class=\"form-control\" id=\"usuario\" required>
                            <option value=\"\">Selecione</option>
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
        // line 70
        if (array_key_exists("mensagem", $context)) {
            // line 71
            echo "        <div class=\"row alert alert-success\">
            ";
            // line 72
            echo twig_escape_filter($this->env, (isset($context["mensagem"]) || array_key_exists("mensagem", $context) ? $context["mensagem"] : (function () { throw new Twig_Error_Runtime('Variable "mensagem" does not exist.', 72, $this->source); })()), "html", null, true);
            echo "
        </div>
        ";
        }
        // line 75
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
        return array (  117 => 75,  111 => 72,  108 => 71,  106 => 70,  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'leiaute.twig' %}

{% block conteudo %}
    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <header>
                <h2><span class=\"fa fa-leaf\" aria-hidden=\"true\"></span>&nbsp;Ação social</h2>
                <small>ações sociais oferecidas pela instituição</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmCadastro\" action=\"{{ path('acaoSalvar')}}\" method=\"POST\">
                <div class=\"form-group form-check-inline\">
                    <label class=\"form-check-label\">Atendimento
                        <input type=\"radio\" id=\"tipo_acao\" name=\"tipo_acao\" class=\"form-check-input\" value=\"A\" checked=\"true\">
                    </label>
                    <label class=\"form-check-label\">Turma
                        <input type=\"radio\" id=\"tipo_acao\" name=\"tipo_acao\" class=\"form-check-input\" value=\"T\">
                    </label>
                </div>
                <fieldset>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados básicos</b></legend>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"nome\">Nome</label>
                        <input type=\"text\" id=\"nome\" class=\"form-control\" placeholder=\"O nome da ação social\" autofocus required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"inicio\">Início</label>
                        <input type=\"date\" id=\"inicio\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-3\">
                        <label for=\"termino\">Término</label>
                        <input type=\"date\" id=\"termino\" class=\"form-control\" placeholder=\"dd/mm/aaaa\" required>
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"publico-alvo\">Público-alvo</label>
                        <input type=\"text\" id=\"publico-alvo\" class=\"form-control\" placeholder=\"adolescentes, maiores de 12 anos e de ambos os sexos\">
                    </div>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"pre-requisito\">Pré-requisito</label>
                        <input type=\"text\" id=\"pre-requisito\" class=\"form-control\" placeholder=\"estar na 4ª série, ter feito informática básica\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"voluntario\">Voluntário</label>
                        <select class=\"form-control\" id=\"voluntario\" required>
                            <option value=\"\">Selecione</option>
                        </select>
                    </div>
                </fieldset>
                <fieldset disabled>
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Usuários</b></legend>
                    <div class=\"form-group\">
                        <select class=\"form-control\" id=\"usuario\" required>
                            <option value=\"\">Selecione</option>
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
", "cadastroAcao.twig", "/var/www/html/PNSLSocial/web/view/cadastroAcao.twig");
    }
}
