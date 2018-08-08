<?php

/* cadastroResponsavel.twig */
class __TwigTemplate_8db8f487cacae44bf48863b9e6087a814459b6a1ba7ea09f6179e52029c723c2 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("leiaute.twig", "cadastroResponsavel.twig", 1);
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
                <h2><span class=\"fa fa-users\" aria-hidden=\"true\"></span>&nbsp;Responsável</h2>
                <small>adultos atendidos pela instituição ou responáveis por menores de idade</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmTipo\" action=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("responsavelSalvar");
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
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados do responsável</b></legend>
                    <div class=\"form-group form-check-inline col-sm-7\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Parentesco</label><br />
                        <label class=\"form-check-label\">Pai
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"PAI\">
                        </label>
                        <label class=\"form-check-label\">Mãe
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"MAE\">
                        </label>
                        <label class=\"form-check-label\">Avô
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"AVO\">
                        </label>
                        <label class=\"form-check-label\">Avó
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"AVH\">
                        </label>
                        <label class=\"form-check-label\">Tio
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"TIO\">
                        </label>
                        <label class=\"form-check-label\">Tia
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"TIA\">
                        </label>
                        <label class=\"form-check-label\">Tutor
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"TUT\">
                        </label>
                        <label class=\"form-check-label\">Tutora
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"TUA\">
                        </label>
                        <label class=\"form-check-label\">Padrinho
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"PAD\">
                        </label>
                        <label class=\"form-check-label\">Madrinha
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"MAD\">
                        </label>
                    </div>
                    <div class=\"form-group col-sm-5\">
                        <label for=\"menor\">Menor</label>
                        <input type=\"text\" id=\"menor\" class=\"form-control\" placeholder=\"Nome do menor\" required>
                        <div class=\"input-group-append\">
                            <button class=\"btn btn-outline-secondary\" type=\"button\">Pesquisar</button>
                        </div>
                    </div>
                    <div class=\"clearfix\">&nbsp;</div>
                    <div class=\"form-group form-check-inline col-sm-4\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Está empregado</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"checkbox\" id=\"empregado\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"checkbox\" id=\"empregado\" class=\"form-check-input\" value=\"N\">
                        </label>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-4\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Autorizou uso da imagem</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"checkbox\" id=\"assinouTermo\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"checkbox\" id=\"assinouTermo\" class=\"form-check-input\" value=\"N\">
                        </label>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-4\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Autorizou o menor sair sozinho</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"checkbox\" id=\"autorizouSairSozinho\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"checkbox\" id=\"autorizouSairSozinho\" class=\"form-check-input\" value=\"N\">
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
        // line 129
        if (array_key_exists("mensagem", $context)) {
            // line 130
            echo "        <div class=\"row alert alert-success\">
            ";
            // line 131
            echo twig_escape_filter($this->env, (isset($context["mensagem"]) || array_key_exists("mensagem", $context) ? $context["mensagem"] : (function () { throw new Twig_Error_Runtime('Variable "mensagem" does not exist.', 131, $this->source); })()), "html", null, true);
            echo "
        </div>
        ";
        }
        // line 134
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "cadastroResponsavel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 134,  170 => 131,  167 => 130,  165 => 129,  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'leiaute.twig' %}

{% block conteudo %}
    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <header>
                <h2><span class=\"fa fa-users\" aria-hidden=\"true\"></span>&nbsp;Responsável</h2>
                <small>adultos atendidos pela instituição ou responáveis por menores de idade</small>
            </header>
        </div>
        <div class=\"row col-sm-8 col-sm-offset-2\">
            <form name=\"frmTipo\" action=\"{{ path('responsavelSalvar')}}\" method=\"POST\">
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
                <legend><i class=\"glyphicon glyphicon-menu-right\"></i><b>Dados do responsável</b></legend>
                    <div class=\"form-group form-check-inline col-sm-7\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Parentesco</label><br />
                        <label class=\"form-check-label\">Pai
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"PAI\">
                        </label>
                        <label class=\"form-check-label\">Mãe
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"MAE\">
                        </label>
                        <label class=\"form-check-label\">Avô
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"AVO\">
                        </label>
                        <label class=\"form-check-label\">Avó
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"AVH\">
                        </label>
                        <label class=\"form-check-label\">Tio
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"TIO\">
                        </label>
                        <label class=\"form-check-label\">Tia
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"TIA\">
                        </label>
                        <label class=\"form-check-label\">Tutor
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"TUT\">
                        </label>
                        <label class=\"form-check-label\">Tutora
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"TUA\">
                        </label>
                        <label class=\"form-check-label\">Padrinho
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"PAD\">
                        </label>
                        <label class=\"form-check-label\">Madrinha
                            <input type=\"checkbox\" id=\"parentesco\" class=\"form-check-input\" value=\"MAD\">
                        </label>
                    </div>
                    <div class=\"form-group col-sm-5\">
                        <label for=\"menor\">Menor</label>
                        <input type=\"text\" id=\"menor\" class=\"form-control\" placeholder=\"Nome do menor\" required>
                        <div class=\"input-group-append\">
                            <button class=\"btn btn-outline-secondary\" type=\"button\">Pesquisar</button>
                        </div>
                    </div>
                    <div class=\"clearfix\">&nbsp;</div>
                    <div class=\"form-group form-check-inline col-sm-4\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Está empregado</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"checkbox\" id=\"empregado\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"checkbox\" id=\"empregado\" class=\"form-check-input\" value=\"N\">
                        </label>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-4\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Autorizou uso da imagem</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"checkbox\" id=\"assinouTermo\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"checkbox\" id=\"assinouTermo\" class=\"form-check-input\" value=\"N\">
                        </label>
                    </div>
                    <div class=\"form-group form-check-inline col-sm-4\">
                        <label for=\"assinouTermo\" class=\"form-check-label\">Autorizou o menor sair sozinho</label><br />
                        <label class=\"form-check-label\">Sim
                            <input type=\"checkbox\" id=\"autorizouSairSozinho\" class=\"form-check-input\" value=\"S\">
                        </label>
                        <label class=\"form-check-label\">Não
                            <input type=\"checkbox\" id=\"autorizouSairSozinho\" class=\"form-check-input\" value=\"N\">
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
", "cadastroResponsavel.twig", "/home/85236250110/Documentos/trabalho/public-html/PNSLSocial/web/view/cadastroResponsavel.twig");
    }
}
