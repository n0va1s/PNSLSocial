<?php

/* leiaute.twig */
class __TwigTemplate_bd713238093af8e81de5885393d5f3e4d39fe83449be3949b2586ebca15882dc extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'titulo' => array($this, 'block_titulo'),
            'topo' => array($this, 'block_topo'),
            'conteudo' => array($this, 'block_conteudo'),
            'rodape' => array($this, 'block_rodape'),
            'contato' => array($this, 'block_contato'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"Onde empreendedores e organizações se encontram\">
    <meta name=\"keywords\" content=\"impacto social, empreendedorismo, negócio social\"/>
    <meta name=\"robots\" content=\"index, follow\">
    <meta name=\"author\" content=\"jp.trabalho@gmail.com\">
    <meta name=\"author\" content=\"aaportilho@gmail.com\">

    <title>";
        // line 14
        $this->displayBlock('titulo', $context, $blocks);
        echo "</title>
    <link rel=\"shortcut icon\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("favicon.ico", "img"), "html", null, true);
        echo "\" />
    <!-- Bootstrap Core CSS -->
    <!--<link href=\"/web/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">-->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">

   <!-- Login CSS -->
   <link href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("login.css", "css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    
    <!-- Theme CSS -->
    <link href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("clean-blog.css", "css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("sb-admin-2.css", "css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Form CSS -->
    <link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("form.css", "css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Quadro CSS -->
    <link href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("quadro.css", "css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <!-- Custom Fonts -->
    <link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>

    <!-- Navigation -->
    <nav class=\"navbar navbar-default navbar-custom navbar-fixed-top\">
        <div class=\"container-fluid\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header page-scroll\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#menu\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    Menu <i class=\"fa fa-bars\"></i>
                </button>
                <a class=\"navbar-brand\" href=\"/\">Início</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse\" id=\"menu\">
                <ul class=\"nav navbar-nav navbar-right\">
                    <li>
                        <a href=\"";
        // line 62
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 62, $this->source); })()), "url_generator", array()), "generate", array(0 => "areaRestrita"), "method"), "html", null, true);
        echo "\">Área restrita</a>
                    </li>
                    <li>
                        <a href=\"";
        // line 65
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new Twig_Error_Runtime('Variable "app" does not exist.', 65, $this->source); })()), "url_generator", array()), "generate", array(0 => "contato"), "method"), "html", null, true);
        echo "\">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

";
        // line 74
        $this->displayBlock('topo', $context, $blocks);
        // line 91
        echo "
";
        // line 92
        $this->displayBlock('conteudo', $context, $blocks);
        // line 95
        echo "
";
        // line 96
        $this->displayBlock('rodape', $context, $blocks);
        // line 99
        echo "
";
        // line 100
        $this->displayBlock('contato', $context, $blocks);
        // line 124
        echo "    <!-- jQuery -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <!--<script src=\"/web/vendor/bootstrap/js/bootstrap.min.js\"></script>-->

    <!-- Contact Form JavaScript -->
    <script src=\"";
        // line 132
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("jqBootstrapValidation.js", "js"), "html", null, true);
        echo "\"></script>

    <!-- Theme JavaScript -->
    <script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("clean-blog.min.js", "js"), "html", null, true);
        echo "\"></script>

    <!-- JavaScript do quadro -->
    <script src=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("quadro.js", "js"), "html", null, true);
        echo "\"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-104095614-1', 'auto');
      ga('send', 'pageview');
    </script>
</body>
</html>";
    }

    // line 14
    public function block_titulo($context, array $blocks = array())
    {
        echo "Social - impacto social na prática";
    }

    // line 74
    public function block_topo($context, array $blocks = array())
    {
        // line 75
        echo "    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class=\"intro-header\" style=\"background-image: url('";
        // line 77
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("about-bg.jpg", "img"), "html", null, true);
        echo "')\">
        <div class=\"container\" style=\"background-color: rgb(0, 0, 0); opacity: 0.5; width: 100%; height: 100%;\">
            <div class=\"row\">
                <div class=\"col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0\">
                    <div class=\"site-heading\">
                        <h1>Social</h1>
                        <hr class=\"small\">
                        <span class=\"subheading\">Impacto social na prática</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
";
    }

    // line 92
    public function block_conteudo($context, array $blocks = array())
    {
        // line 93
        echo "
";
    }

    // line 96
    public function block_rodape($context, array $blocks = array())
    {
        // line 97
        echo "    
";
    }

    // line 100
    public function block_contato($context, array $blocks = array())
    {
        // line 101
        echo "<!-- Footer -->
<footer>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1\">
                <p class=\"copyright text-muted\">Faça parte da nossa comunidade</p>
                <ul class=\"list-inline text-center\">
                    <li>
                        <a href=\"https://www.facebook.com/brinquecoin/\">
                            <span class=\"fa-stack fa-lg\">
                                <i class=\"fa fa-circle fa-stack-2x\"></i>
                                <i class=\"fa fa-facebook fa-stack-1x fa-inverse\"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <p class=\"copyright text-muted\">
                <span class=\"fa-stack fa-lg\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-envelope fa-stack-1x fa-inverse\"></i></span>brinquecoin@brinquecoin.com</p>
            </div>
        </div>
    </div>
</footer>
";
    }

    public function getTemplateName()
    {
        return "leiaute.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  235 => 101,  232 => 100,  227 => 97,  224 => 96,  219 => 93,  216 => 92,  198 => 77,  194 => 75,  191 => 74,  185 => 14,  169 => 138,  163 => 135,  157 => 132,  147 => 124,  145 => 100,  142 => 99,  140 => 96,  137 => 95,  135 => 92,  132 => 91,  130 => 74,  118 => 65,  112 => 62,  78 => 31,  72 => 28,  66 => 25,  62 => 24,  56 => 21,  47 => 15,  43 => 14,  28 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>

    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"Onde empreendedores e organizações se encontram\">
    <meta name=\"keywords\" content=\"impacto social, empreendedorismo, negócio social\"/>
    <meta name=\"robots\" content=\"index, follow\">
    <meta name=\"author\" content=\"jp.trabalho@gmail.com\">
    <meta name=\"author\" content=\"aaportilho@gmail.com\">

    <title>{% block titulo %}Social - impacto social na prática{% endblock %}</title>
    <link rel=\"shortcut icon\" href=\"{{ asset('favicon.ico', 'img') }}\" />
    <!-- Bootstrap Core CSS -->
    <!--<link href=\"/web/vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">-->
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\">

   <!-- Login CSS -->
   <link href=\"{{ asset('login.css', 'css') }}\" rel=\"stylesheet\">
    
    <!-- Theme CSS -->
    <link href=\"{{ asset('clean-blog.css', 'css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('sb-admin-2.css', 'css') }}\" rel=\"stylesheet\">

    <!-- Form CSS -->
    <link href=\"{{ asset('form.css', 'css') }}\" rel=\"stylesheet\">

    <!-- Quadro CSS -->
    <link href=\"{{ asset('quadro.css', 'css') }}\" rel=\"stylesheet\">

    <!-- Custom Fonts -->
    <link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
        <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
</head>
<body>

    <!-- Navigation -->
    <nav class=\"navbar navbar-default navbar-custom navbar-fixed-top\">
        <div class=\"container-fluid\">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class=\"navbar-header page-scroll\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#menu\">
                    <span class=\"sr-only\">Toggle navigation</span>
                    Menu <i class=\"fa fa-bars\"></i>
                </button>
                <a class=\"navbar-brand\" href=\"/\">Início</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=\"collapse navbar-collapse\" id=\"menu\">
                <ul class=\"nav navbar-nav navbar-right\">
                    <li>
                        <a href=\"{{ app.url_generator.generate('areaRestrita') }}\">Área restrita</a>
                    </li>
                    <li>
                        <a href=\"{{ app.url_generator.generate('contato') }}\">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

{% block topo %}
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class=\"intro-header\" style=\"background-image: url('{{ asset('about-bg.jpg', 'img') }}')\">
        <div class=\"container\" style=\"background-color: rgb(0, 0, 0); opacity: 0.5; width: 100%; height: 100%;\">
            <div class=\"row\">
                <div class=\"col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0\">
                    <div class=\"site-heading\">
                        <h1>Social</h1>
                        <hr class=\"small\">
                        <span class=\"subheading\">Impacto social na prática</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
{% endblock %}

{% block conteudo %}

{% endblock %}

{% block rodape %}
    
{% endblock rodape %}

{% block contato %}
<!-- Footer -->
<footer>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1\">
                <p class=\"copyright text-muted\">Faça parte da nossa comunidade</p>
                <ul class=\"list-inline text-center\">
                    <li>
                        <a href=\"https://www.facebook.com/brinquecoin/\">
                            <span class=\"fa-stack fa-lg\">
                                <i class=\"fa fa-circle fa-stack-2x\"></i>
                                <i class=\"fa fa-facebook fa-stack-1x fa-inverse\"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <p class=\"copyright text-muted\">
                <span class=\"fa-stack fa-lg\"><i class=\"fa fa-circle fa-stack-2x\"></i><i class=\"fa fa-envelope fa-stack-1x fa-inverse\"></i></span>brinquecoin@brinquecoin.com</p>
            </div>
        </div>
    </div>
</footer>
{% endblock %}
    <!-- jQuery -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <!--<script src=\"/web/vendor/bootstrap/js/bootstrap.min.js\"></script>-->

    <!-- Contact Form JavaScript -->
    <script src=\"{{ asset('jqBootstrapValidation.js', 'js') }}\"></script>

    <!-- Theme JavaScript -->
    <script src=\"{{ asset('clean-blog.min.js', 'js') }}\"></script>

    <!-- JavaScript do quadro -->
    <script src=\"{{ asset('quadro.js', 'js') }}\"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-104095614-1', 'auto');
      ga('send', 'pageview');
    </script>
</body>
</html>", "leiaute.twig", "/home/85236250110/Documentos/trabalho/public-html/PNSLSocial/web/view/leiaute.twig");
    }
}
