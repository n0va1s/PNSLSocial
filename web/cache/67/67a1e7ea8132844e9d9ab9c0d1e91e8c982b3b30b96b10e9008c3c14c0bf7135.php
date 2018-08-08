<?php

/* cadastroTipo.twig */
class __TwigTemplate_4b7f8305b219dd231e96c66c7878f4dd154518e3afeedb9ed9980e5c8499033d extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("leiaute.twig", "cadastroTipo.twig", 1);
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
                <h2><span class=\"glyphicon glyphicon-cog\" aria-hidden=\"true\"></span>Configuração</h2>
                <span>ex: voluntário, responsável, menor, administrativo, gestor</span>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmTipo\" action=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("tipoSalvar");
        echo "\" method=\"POST\">
                <fieldset>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"descricao\">Descrição</label>
                        <input type=\"text\" id=\"descricao\" class=\"form-control\" placeholder=\"Voluntário\" autofocus required>
                    </div>
                    <div class=\"form-group col-sm-2 col-sm-offset-2\">
                        <label for=\"grupo\">Grupo
                            <span data-toggle=\"tooltip\" data-placement=\"right\" title=\"3 letras maiúsculas\" class=\"glyphicon glyphicon-question-sign\"></span> 
                        </label>
                        <input type=\"text\" name=\"grupo\" class=\" form-control\" placeholder=\"VOL\" required>
                    </div>
                    <div class=\"form-group col-sm-12 text-center\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"glyphicon glyphicon-ok\"> Cadastrar</i>
                        </button>
                        <button type=\"button\" class=\"btn btn-default\">
                            <i class=\"glyphicon glyphicon-remove\"> Limpar</i>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
        ";
        // line 36
        if (array_key_exists("mensagem", $context)) {
            // line 37
            echo "        <div class=\"row alert alert-success\">
            ";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["mensagem"]) || array_key_exists("mensagem", $context) ? $context["mensagem"] : (function () { throw new Twig_Error_Runtime('Variable "mensagem" does not exist.', 38, $this->source); })()), "html", null, true);
            echo "
        </div>
        ";
        }
        // line 41
        echo "        <div class=\"row col-sm-8 col-sm-offset-2\">
            <table class=\"table table-responsive table-hover\">
            <caption>Configurações cadastradas</caption>
                <thead class=\"thead-light\">
                    <tr>
                        <th class=\"col-sm-7\">Descrição</th>
                        <th class=\"col-sm-2\">Grupo</th>
                        <th class=\"col-sm-1\"><center>Alterar</center></th>
                        <th class=\"col-sm-1\"><center>Excluir</center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Voluntário</td>
                        <td>VOL</td>
                        <td><center><span class=\"glyphicon glyphicon-pencil\"></span></center></td>
                        <td><center><span class=\"glyphicon glyphicon-trash\"></span></center></td>
                    </tr>
                    <tr>
                        <td>Responsável</td>
                        <td>RES</td>
                        <td><center><span class=\"glyphicon glyphicon-pencil\"></span></center></td>
                        <td><center><span class=\"glyphicon glyphicon-trash\"></span></center></td>
                    </tr>
                </tbody>
            </table>
        </div> 
    </div>
";
    }

    public function getTemplateName()
    {
        return "cadastroTipo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 41,  77 => 38,  74 => 37,  72 => 36,  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'leiaute.twig' %}

{% block conteudo %}
    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <header>
                <h2><span class=\"glyphicon glyphicon-cog\" aria-hidden=\"true\"></span>Configuração</h2>
                <span>ex: voluntário, responsável, menor, administrativo, gestor</span>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmTipo\" action=\"{{ path('tipoSalvar')}}\" method=\"POST\">
                <fieldset>
                    <div class=\"form-group col-sm-6\">
                        <label for=\"descricao\">Descrição</label>
                        <input type=\"text\" id=\"descricao\" class=\"form-control\" placeholder=\"Voluntário\" autofocus required>
                    </div>
                    <div class=\"form-group col-sm-2 col-sm-offset-2\">
                        <label for=\"grupo\">Grupo
                            <span data-toggle=\"tooltip\" data-placement=\"right\" title=\"3 letras maiúsculas\" class=\"glyphicon glyphicon-question-sign\"></span> 
                        </label>
                        <input type=\"text\" name=\"grupo\" class=\" form-control\" placeholder=\"VOL\" required>
                    </div>
                    <div class=\"form-group col-sm-12 text-center\">
                        <button type=\"submit\" class=\"btn btn-primary\">
                            <i class=\"glyphicon glyphicon-ok\"> Cadastrar</i>
                        </button>
                        <button type=\"button\" class=\"btn btn-default\">
                            <i class=\"glyphicon glyphicon-remove\"> Limpar</i>
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
        {% if mensagem is defined %}
        <div class=\"row alert alert-success\">
            {{ mensagem }}
        </div>
        {% endif %}
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <table class=\"table table-responsive table-hover\">
            <caption>Configurações cadastradas</caption>
                <thead class=\"thead-light\">
                    <tr>
                        <th class=\"col-sm-7\">Descrição</th>
                        <th class=\"col-sm-2\">Grupo</th>
                        <th class=\"col-sm-1\"><center>Alterar</center></th>
                        <th class=\"col-sm-1\"><center>Excluir</center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Voluntário</td>
                        <td>VOL</td>
                        <td><center><span class=\"glyphicon glyphicon-pencil\"></span></center></td>
                        <td><center><span class=\"glyphicon glyphicon-trash\"></span></center></td>
                    </tr>
                    <tr>
                        <td>Responsável</td>
                        <td>RES</td>
                        <td><center><span class=\"glyphicon glyphicon-pencil\"></span></center></td>
                        <td><center><span class=\"glyphicon glyphicon-trash\"></span></center></td>
                    </tr>
                </tbody>
            </table>
        </div> 
    </div>
{% endblock %}
", "cadastroTipo.twig", "/home/85236250110/Documentos/trabalho/public-html/PNSLSocial/web/view/cadastroTipo.twig");
    }
}
