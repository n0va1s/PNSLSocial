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
        <a href=\"";
        // line 13
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("voluntarioCadastrar");
        echo "\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-vcard-o fa-3x\"></span>
                <h4 style=\"color:#303030;\">Voluntário</h4>
                <p>pessoas que prestam o serviço social</p>
            </div>
        </a>
        <a href=\"";
        // line 20
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("usuarioCadastrar");
        echo "\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-users fa-3x\"></span>
                <h4>Usuário</h4>
                <p>pessoas atendidas pela instituição</p>
            </div>
        </a>
        <a href=\"";
        // line 27
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("relatorioPrestacaoConta");
        echo "\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-info fa-3x\"></span>
                <h4>Prestação de contas</h4>
                <p>Relatório para prestação de contas anual</p>
            </div>
        </a>
    </div>
    <br><br>
    <div class=\"row slideanim text-center\">
        <a href=\"";
        // line 37
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("acaoCadastrar");
        echo "\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-leaf fa-3x\"></span>
                <h4>Ação</h4>
                <p>ações sociais oferecidas pela instituição</p>
            </div>
        </a>
        <a href=\"";
        // line 44
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("frequenciaCadastrar");
        echo "\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-graduation-cap fa-3x\"></span>
                <h4>Frequência</h4>
                <p>frequência dos usuários que participam de ações em grupo como: aulas, oficinas e palestras</p>
            </div>
        </a>
        <a href=\"";
        // line 51
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("atendimentoCadastrar");
        echo "\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-user-md fa-3x\"></span>
                <h4>Atendimento</h4>
                <p>registro dos atendimentos de ações individuais como: médicos, psicólogos, dentistas, advogados ou empreendedores</p>
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
        return array (  99 => 51,  89 => 44,  79 => 37,  66 => 27,  56 => 20,  46 => 13,  35 => 4,  32 => 3,  15 => 1,);
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
        <a href=\"{{ path('voluntarioCadastrar') }}\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-vcard-o fa-3x\"></span>
                <h4 style=\"color:#303030;\">Voluntário</h4>
                <p>pessoas que prestam o serviço social</p>
            </div>
        </a>
        <a href=\"{{ path('usuarioCadastrar') }}\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-users fa-3x\"></span>
                <h4>Usuário</h4>
                <p>pessoas atendidas pela instituição</p>
            </div>
        </a>
        <a href=\"{{ path('relatorioPrestacaoConta') }}\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-info fa-3x\"></span>
                <h4>Prestação de contas</h4>
                <p>Relatório para prestação de contas anual</p>
            </div>
        </a>
    </div>
    <br><br>
    <div class=\"row slideanim text-center\">
        <a href=\"{{ path('acaoCadastrar') }}\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-leaf fa-3x\"></span>
                <h4>Ação</h4>
                <p>ações sociais oferecidas pela instituição</p>
            </div>
        </a>
        <a href=\"{{ path('frequenciaCadastrar') }}\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-graduation-cap fa-3x\"></span>
                <h4>Frequência</h4>
                <p>frequência dos usuários que participam de ações em grupo como: aulas, oficinas e palestras</p>
            </div>
        </a>
        <a href=\"{{ path('atendimentoCadastrar') }}\">
            <div class=\"col-sm-4\">
                <span class=\"fa fa-user-md fa-3x\"></span>
                <h4>Atendimento</h4>
                <p>registro dos atendimentos de ações individuais como: médicos, psicólogos, dentistas, advogados ou empreendedores</p>
            </div>
        </a>
    </div>
</div>
{% endblock %}", "areaRestrita.twig", "/var/www/html/PNSLSocial/web/view/areaRestrita.twig");
    }
}
