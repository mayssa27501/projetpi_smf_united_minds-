<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* article/index.html.twig */
class __TwigTemplate_e8b5cde8ca2060271d7be8a0d3f0d0ac extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layoutBackOffice.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "article/index.html.twig"));

        $this->parent = $this->loadTemplate("layoutBackOffice.html.twig", "article/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Article index";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo " <style> 
 .circular-image {
      width: 70%;
      height: 10%;
      object-fit: contain;
    }
  </style>

";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "flashes", [0 => "notification"], "method", false, false, false, 14));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 15
            echo "      <div class=\"alert alert-info alert-dismissible fade show\">
            ";
            // line 16
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    <h1>Article index</h1>
      <div class=\"d-flex justify-content-end mb-3\">
        <form class=\"input-group\" method=\"get\">
        <input type=\"search\" id=\"myInput\" class=\"form-control pl-6\" placeholder=\"Search \"/>
\t\t\t\t\t
\t\t\t\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js\"></script>
\t\t\t\t\t<script>
\t\t\t\t\t\t\$(document).ready(function () {
                        \$(\"#myInput\").on(\"keyup\", function () {
                        var value = \$(this).val().toLowerCase();
                        \$(\"#rs tr\").filter(function () {
                        \$(this).toggle(\$(this).text().toLowerCase().indexOf(value) > -1)
                            });
                         })
                        });
\t\t\t\t\t</script>
        </form>

        <div class=\"ms-3\">
          <a href=\"";
        // line 39
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_index", ["sort" => "titre_artic"]);
        echo "\" class=\"btn btn-outline-primary\">Trier par Titre</a>
        </div>

        <div class=\"ms-3\">
          <a href=\"";
        // line 43
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_index", ["sort" => "date_ajout_artic"]);
        echo "\" class=\"btn btn-outline-primary\">Trier par Date</a>
        </div>
         <div class=\"ms-3\">
          <a href=\"";
        // line 46
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_index", ["sort" => "theme_artic"]);
        echo "\" class=\"btn btn-outline-primary\">Trier par Theme</a>
        </div>
      </div>

    <table class=\"table\" id=\"rs\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre_artic</th>
                <th>Theme_artic</th>
                <th>Date_ajout_artic</th>
                <th>Descriptif_artic</th>
                <th>image</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["articles"]) || array_key_exists("articles", $context) ? $context["articles"] : (function () { throw new RuntimeError('Variable "articles" does not exist.', 63, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 64
            echo "            <tr>
                <td>";
            // line 65
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 65), "html", null, true);
            echo "</td>
                <td>";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "titreArtic", [], "any", false, false, false, 66), "html", null, true);
            echo "</td>
                <td>";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "themeArtic", [], "any", false, false, false, 67), "html", null, true);
            echo "</td>
                <td>";
            // line 68
            ((twig_get_attribute($this->env, $this->source, $context["article"], "dateAjoutArtic", [], "any", false, false, false, 68)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "dateAjoutArtic", [], "any", false, false, false, 68), "Y-m-d"), "html", null, true))) : (print ("")));
            echo "</td>
                <td>";
            // line 69
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "descriptifArtic", [], "any", false, false, false, 69), "html", null, true);
            echo "</td>
                <td><img  src=\"";
            // line 70
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("photo/" . twig_get_attribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 70))), "html", null, true);
            echo "\" alt=\"Game\" class=\"circular-image\"></td>
                <td>
                    <a href=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_show", ["id" => twig_get_attribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 72)]), "html", null, true);
            echo "\">show</a>
                    <a href=\"";
            // line 73
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 73)]), "html", null, true);
            echo "\">edit</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 77
            echo "            <tr>
                <td colspan=\"6\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "        </tbody>
    </table>

  <a href=\"";
        // line 84
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_new");
        echo "\">Create new</a>
   <a href=\"";
        // line 85
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("generator_service");
        echo "\" class=\"btn btn-primary px-3 py-1\">Export PDF</a>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "article/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 85,  214 => 84,  209 => 81,  200 => 77,  191 => 73,  187 => 72,  182 => 70,  178 => 69,  174 => 68,  170 => 67,  166 => 66,  162 => 65,  159 => 64,  154 => 63,  134 => 46,  128 => 43,  121 => 39,  100 => 20,  90 => 16,  87 => 15,  83 => 14,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layoutBackOffice.html.twig' %}

{% block title %}Article index{% endblock %}

{% block body %}
 <style> 
 .circular-image {
      width: 70%;
      height: 10%;
      object-fit: contain;
    }
  </style>

{% for message in app.flashes('notification') %}
      <div class=\"alert alert-info alert-dismissible fade show\">
            {{ message }}
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
        </div>
    {% endfor %}
    <h1>Article index</h1>
      <div class=\"d-flex justify-content-end mb-3\">
        <form class=\"input-group\" method=\"get\">
        <input type=\"search\" id=\"myInput\" class=\"form-control pl-6\" placeholder=\"Search \"/>
\t\t\t\t\t
\t\t\t\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js\"></script>
\t\t\t\t\t<script>
\t\t\t\t\t\t\$(document).ready(function () {
                        \$(\"#myInput\").on(\"keyup\", function () {
                        var value = \$(this).val().toLowerCase();
                        \$(\"#rs tr\").filter(function () {
                        \$(this).toggle(\$(this).text().toLowerCase().indexOf(value) > -1)
                            });
                         })
                        });
\t\t\t\t\t</script>
        </form>

        <div class=\"ms-3\">
          <a href=\"{{ path('app_article_index', {'sort': 'titre_artic'}) }}\" class=\"btn btn-outline-primary\">Trier par Titre</a>
        </div>

        <div class=\"ms-3\">
          <a href=\"{{ path('app_article_index', {'sort': 'date_ajout_artic'}) }}\" class=\"btn btn-outline-primary\">Trier par Date</a>
        </div>
         <div class=\"ms-3\">
          <a href=\"{{ path('app_article_index', {'sort': 'theme_artic'}) }}\" class=\"btn btn-outline-primary\">Trier par Theme</a>
        </div>
      </div>

    <table class=\"table\" id=\"rs\">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre_artic</th>
                <th>Theme_artic</th>
                <th>Date_ajout_artic</th>
                <th>Descriptif_artic</th>
                <th>image</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        {% for article in articles %}
            <tr>
                <td>{{ article.id }}</td>
                <td>{{ article.titreArtic }}</td>
                <td>{{ article.themeArtic }}</td>
                <td>{{ article.dateAjoutArtic ? article.dateAjoutArtic|date('Y-m-d') : '' }}</td>
                <td>{{ article.descriptifArtic }}</td>
                <td><img  src=\"{{asset('photo/'~article.image)}}\" alt=\"Game\" class=\"circular-image\"></td>
                <td>
                    <a href=\"{{ path('app_article_show', {'id': article.id}) }}\">show</a>
                    <a href=\"{{ path('app_article_edit', {'id': article.id}) }}\">edit</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"6\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

  <a href=\"{{ path('app_article_new') }}\">Create new</a>
   <a href=\"{{ path('generator_service') }}\" class=\"btn btn-primary px-3 py-1\">Export PDF</a>
{% endblock %}
", "article/index.html.twig", "C:\\Users\\MSI\\Desktop\\arslen\\piweb\\templates\\article\\index.html.twig");
    }
}
