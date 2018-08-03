<?php

/* areaRestrita.twig */
class __TwigTemplate_f437f5b9f1758b894162a1c59ad48ce16e34b5dc7b677536cf5b2a093b2f0365 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("leiaute.twig", "areaRestrita.twig", 1);
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
        echo "<div class=\"container\">
  <div class=\"row\">
        <header>
            <h2><span class=\"glyphicon glyphicon-tree-deciduous\" aria-hidden=\"true\"></span>Área restrita</h2>
            <span>o lugar para gerenciar pessoas, ações sociais, turmas e atendimentos</span>
        </header>
    </div>
    <br><br>
    <div class=\"row slideanim text-center\">
        <a href=\"/voluntario\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-vcard-o fa-3x\"></span>
                <h4 style=\"color:#303030;\">Voluntário</h4>
                <p>pessoas que prestam o serviço social</p>
            </div>
        </a>
        <a href=\"/responsavel\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-users fa-3x\"></span>
                <h4>Responsável</h4>
                <p>adultos atendidos pela instituição ou responáveis por menores de idade</p>
            </div>
        </a>
        <a href=\"/menor\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-user fa-3x\"></span>
                <h4>Menor</h4>
                <p>jovens atendidos pela casa</p>
            </div>
        </a>
    </div>
    <br><br>
    <div class=\"row slideanim text-center\">
        <a href=\"/acao\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-leaf fa-3x\"></span>
                <h4>Ação</h4>
                <p>ações sociais oferecidas pela instituição</p>
            </div>
        </a>
        <a href=\"/turma\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-graduation-cap fa-3x\"></span>
                <h4>Turma</h4>
                <p>ação social realizada em grupo como aulas, oficinas e palestras</p>
            </div>
        </a>
        <a href=\"/atendimento\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-user-md fa-3x\"></span>
                <h4>Atendimento</h4>
                <p>ação social individual como atendimentos por médicos, psicólogos, dentistas, advogados ou empreendedores</p>
            </div>
        </a>
    </div>
    <br><br>
    <div class=\"row slideanim text-center\">
        <a href=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 61, $this->source); })()), "url_generator", array()), "generate", array(0 => "tipoCadastrar"), "method"), "html", null, true);
        echo "\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-gear fa-3x\"></span>
                <h4>Configuração</h4>
                <p>Cadastre os tipos de pessoas ou de ação que o serão usados em outros cadastros...</p>
            </div>
        </a>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "areaRestrita.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 61,  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'leiaute.twig' %}

{% block conteudo %}
<div class=\"container\">
  <div class=\"row\">
        <header>
            <h2><span class=\"glyphicon glyphicon-tree-deciduous\" aria-hidden=\"true\"></span>Área restrita</h2>
            <span>o lugar para gerenciar pessoas, ações sociais, turmas e atendimentos</span>
        </header>
    </div>
    <br><br>
    <div class=\"row slideanim text-center\">
        <a href=\"/voluntario\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-vcard-o fa-3x\"></span>
                <h4 style=\"color:#303030;\">Voluntário</h4>
                <p>pessoas que prestam o serviço social</p>
            </div>
        </a>
        <a href=\"/responsavel\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-users fa-3x\"></span>
                <h4>Responsável</h4>
                <p>adultos atendidos pela instituição ou responáveis por menores de idade</p>
            </div>
        </a>
        <a href=\"/menor\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-user fa-3x\"></span>
                <h4>Menor</h4>
                <p>jovens atendidos pela casa</p>
            </div>
        </a>
    </div>
    <br><br>
    <div class=\"row slideanim text-center\">
        <a href=\"/acao\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-leaf fa-3x\"></span>
                <h4>Ação</h4>
                <p>ações sociais oferecidas pela instituição</p>
            </div>
        </a>
        <a href=\"/turma\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-graduation-cap fa-3x\"></span>
                <h4>Turma</h4>
                <p>ação social realizada em grupo como aulas, oficinas e palestras</p>
            </div>
        </a>
        <a href=\"/atendimento\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-user-md fa-3x\"></span>
                <h4>Atendimento</h4>
                <p>ação social individual como atendimentos por médicos, psicólogos, dentistas, advogados ou empreendedores</p>
            </div>
        </a>
    </div>
    <br><br>
    <div class=\"row slideanim text-center\">
        <a href=\"{{ app.url_generator.generate('tipoCadastrar') }}\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-gear fa-3x\"></span>
                <h4>Configuração</h4>
                <p>Cadastre os tipos de pessoas ou de ação que o serão usados em outros cadastros...</p>
            </div>
        </a>
    </div>
</div>
{% endblock %}", "areaRestrita.twig", "/home/85236250110/Documentos/trabalho/public-html/PNSLSocial/web/view/areaRestrita.twig");
    }
}
