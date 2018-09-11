<?php

/* inicio.twig */
class __TwigTemplate_dc34d5b9b47baad699b1658322d11bf8e1030c69a7af23ee519abe1ff267dd4b extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("leiaute.twig", "inicio.twig", 1);
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
        <div class=\"row\">
            <p>
                A <b>Casa São José</b> é uma instituição sem fins lucrativos que ...<br />
            </p>
            <div class=\"col-sm-6\">
                <h2 class=\"post-title\">Nossa missão</h2>
                <p>
                    <p>Transformar a comunidade do Varjão com ações sociais de impacto realizadas por pessoas comprometidas e sustentadas por São José um grande trabalhador</p>
                </p>
            </div>
            <div class=\"col-sm-6\">
                <h2>Nossos valores</h2>
                <ul>
                    <li>Sonho grande</li>
                    <li>Legado</li>
                    <li>Execução</li>
                    <li>Conhecimento aplicado</li>
                    <li>Protagonismo</li>
                    <li>Gente boa</li>
                </ul>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-3\">
                <div class=\"panel panel-primary\">
                    <div class=\"panel-heading\">
                        <div class=\"row\">
                            <div class=\"col-xs-3\">
                                <i class=\"glyphicon glyphicon-star fa-3x\"></i>
                            </div>
                            <div class=\"col-xs-9 text-right\">
                                <div class=\"huge\">6&nbsp;</div>
                                <div>Transformadores&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <a href=\"#\">
                        <div class=\"panel-footer\">
                            <span class=\"pull-left\">2 gestores</span><br />
                            <span class=\"pull-left\">2 assitentes sociais</span><br />
                            <span class=\"pull-left\">2 funcionários</span><br />
                            <br />
                            <div class=\"clearfix\"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class=\"col-sm-3\">
                <div class=\"panel panel-green\">
                    <div class=\"panel-heading\">
                        <div class=\"row\">
                            <div class=\"col-xs-3\">
                                <i class=\"glyphicon glyphicon-leaf fa-3x\"></i>
                            </div>
                            <div class=\"col-xs-9 text-right\">
                                <div class=\"huge\">12&nbsp;</div>
                                <div>Ações Sociais&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <a href=\"#\">
                        <div class=\"panel-footer\">
                            <span class=\"pull-left\">10 voluntários</span><br />
                            <br /><br /><br />
                            <div class=\"clearfix\"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class=\"col-sm-3\">
                <div class=\"panel panel-yellow\">
                    <div class=\"panel-heading\">
                        <div class=\"row\">
                            <div class=\"col-xs-3\">
                                <i class=\"glyphicon glyphicon-education fa-3x\"></i>
                            </div>
                            <div class=\"col-xs-9 text-right\">
                                <div class=\"huge\">12&nbsp;</div>
                                <div>Turmas&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <a href=\"#\">
                        <div class=\"panel-footer\">
                            <span class=\"pull-left\">1 - Dança</span><br />
                            <span class=\"pull-left\">1 - Educação</span><br />
                            <span class=\"pull-left\">7 - Empreendedorismo</span><br />
                            <span class=\"pull-left\">3 - Informática</span><br />
                            <div class=\"clearfix\"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class=\"col-sm-3\">
                <div class=\"panel panel-red\">
                    <div class=\"panel-heading\">
                        <div class=\"row\">
                            <div class=\"col-xs-3\">
                                <i class=\"glyphicon glyphicon-user fa-3x\"></i>
                            </div>
                            <div class=\"col-xs-9 text-right\">
                                <div class=\"huge\">112&nbsp;</div>
                                <div>Atendimentos&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <a href=\"#\">
                        <div class=\"panel-footer\">
                            <span class=\"pull-left\">19 - Psicologia</span><br />
                            <span class=\"pull-left\">40 - Odontologia</span><br />
                            <span class=\"pull-left\">11 - Jurídico</span><br />
                            <span class=\"pull-left\">42 - Medicina</span><br />
                            <div class=\"clearfix\"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class=\"row\">
            <div class=\"col-sm-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <i class=\"glyphicon glyphicon-fire fa-fw\"></i> Últimas ações cadastradas
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">Ação</th>
                                    <th scope=\"col\">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>LabHacker do Bem</td>
                                    <td>12/2016</td>
                                </tr>
                                <tr>
                                    <td>Panificação profissional</td>
                                    <td>03/2017</td>
                                </tr>
                                <tr>
                                    <td>Massagem</td>
                                    <td>02/2018</td>
                                </tr>
                            </tbody>
                        </table>                
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <i class=\"glyphicon glyphicon-equalizer fa-fw\"></i> Últimas atualizações
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">Ação</th>
                                    <th scope=\"col\">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Transformança</td>
                                    <td>15/09/2018</td>
                                </tr>
                                <tr>
                                    <td>LabHacker do Bem</td>
                                    <td>15/09/2018</td>
                                </tr>
                                <tr>
                                    <td>Atendimento Jurídico</td>
                                    <td>14/09/2018</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <i class=\"glyphicon glyphicon-tags fa-fw\"></i> Pessoas por faixa etária
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">Tipo</th>
                                    <th scope=\"col\">Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Adultos</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Adolescentes</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>Crianças</td>
                                    <td>6</td>
                                </tr>
                                <tr>
                                    <td>Mulheres</td>
                                    <td>6</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
 ";
    }

    public function getTemplateName()
    {
        return "inicio.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 4,  32 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'leiaute.twig' %}

{% block conteudo %}
    <!-- Main Content -->
    <div class=\"container\">
        <div class=\"row\">
            <p>
                A <b>Casa São José</b> é uma instituição sem fins lucrativos que ...<br />
            </p>
            <div class=\"col-sm-6\">
                <h2 class=\"post-title\">Nossa missão</h2>
                <p>
                    <p>Transformar a comunidade do Varjão com ações sociais de impacto realizadas por pessoas comprometidas e sustentadas por São José um grande trabalhador</p>
                </p>
            </div>
            <div class=\"col-sm-6\">
                <h2>Nossos valores</h2>
                <ul>
                    <li>Sonho grande</li>
                    <li>Legado</li>
                    <li>Execução</li>
                    <li>Conhecimento aplicado</li>
                    <li>Protagonismo</li>
                    <li>Gente boa</li>
                </ul>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-3\">
                <div class=\"panel panel-primary\">
                    <div class=\"panel-heading\">
                        <div class=\"row\">
                            <div class=\"col-xs-3\">
                                <i class=\"glyphicon glyphicon-star fa-3x\"></i>
                            </div>
                            <div class=\"col-xs-9 text-right\">
                                <div class=\"huge\">6&nbsp;</div>
                                <div>Transformadores&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <a href=\"#\">
                        <div class=\"panel-footer\">
                            <span class=\"pull-left\">2 gestores</span><br />
                            <span class=\"pull-left\">2 assitentes sociais</span><br />
                            <span class=\"pull-left\">2 funcionários</span><br />
                            <br />
                            <div class=\"clearfix\"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class=\"col-sm-3\">
                <div class=\"panel panel-green\">
                    <div class=\"panel-heading\">
                        <div class=\"row\">
                            <div class=\"col-xs-3\">
                                <i class=\"glyphicon glyphicon-leaf fa-3x\"></i>
                            </div>
                            <div class=\"col-xs-9 text-right\">
                                <div class=\"huge\">12&nbsp;</div>
                                <div>Ações Sociais&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <a href=\"#\">
                        <div class=\"panel-footer\">
                            <span class=\"pull-left\">10 voluntários</span><br />
                            <br /><br /><br />
                            <div class=\"clearfix\"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class=\"col-sm-3\">
                <div class=\"panel panel-yellow\">
                    <div class=\"panel-heading\">
                        <div class=\"row\">
                            <div class=\"col-xs-3\">
                                <i class=\"glyphicon glyphicon-education fa-3x\"></i>
                            </div>
                            <div class=\"col-xs-9 text-right\">
                                <div class=\"huge\">12&nbsp;</div>
                                <div>Turmas&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <a href=\"#\">
                        <div class=\"panel-footer\">
                            <span class=\"pull-left\">1 - Dança</span><br />
                            <span class=\"pull-left\">1 - Educação</span><br />
                            <span class=\"pull-left\">7 - Empreendedorismo</span><br />
                            <span class=\"pull-left\">3 - Informática</span><br />
                            <div class=\"clearfix\"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class=\"col-sm-3\">
                <div class=\"panel panel-red\">
                    <div class=\"panel-heading\">
                        <div class=\"row\">
                            <div class=\"col-xs-3\">
                                <i class=\"glyphicon glyphicon-user fa-3x\"></i>
                            </div>
                            <div class=\"col-xs-9 text-right\">
                                <div class=\"huge\">112&nbsp;</div>
                                <div>Atendimentos&nbsp;</div>
                            </div>
                        </div>
                    </div>
                    <a href=\"#\">
                        <div class=\"panel-footer\">
                            <span class=\"pull-left\">19 - Psicologia</span><br />
                            <span class=\"pull-left\">40 - Odontologia</span><br />
                            <span class=\"pull-left\">11 - Jurídico</span><br />
                            <span class=\"pull-left\">42 - Medicina</span><br />
                            <div class=\"clearfix\"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class=\"row\">
            <div class=\"col-sm-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <i class=\"glyphicon glyphicon-fire fa-fw\"></i> Últimas ações cadastradas
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">Ação</th>
                                    <th scope=\"col\">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>LabHacker do Bem</td>
                                    <td>12/2016</td>
                                </tr>
                                <tr>
                                    <td>Panificação profissional</td>
                                    <td>03/2017</td>
                                </tr>
                                <tr>
                                    <td>Massagem</td>
                                    <td>02/2018</td>
                                </tr>
                            </tbody>
                        </table>                
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <i class=\"glyphicon glyphicon-equalizer fa-fw\"></i> Últimas atualizações
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">Ação</th>
                                    <th scope=\"col\">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Transformança</td>
                                    <td>15/09/2018</td>
                                </tr>
                                <tr>
                                    <td>LabHacker do Bem</td>
                                    <td>15/09/2018</td>
                                </tr>
                                <tr>
                                    <td>Atendimento Jurídico</td>
                                    <td>14/09/2018</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <i class=\"glyphicon glyphicon-tags fa-fw\"></i> Pessoas por faixa etária
                    </div>
                    <div class=\"panel-body\">
                        <table class=\"table\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">Tipo</th>
                                    <th scope=\"col\">Quantidade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Adultos</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>Adolescentes</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>Crianças</td>
                                    <td>6</td>
                                </tr>
                                <tr>
                                    <td>Mulheres</td>
                                    <td>6</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
 {% endblock %}", "inicio.twig", "/home/85236250110/Documentos/trabalho/public-html/PNSLSocial/web/view/inicio.twig");
    }
}