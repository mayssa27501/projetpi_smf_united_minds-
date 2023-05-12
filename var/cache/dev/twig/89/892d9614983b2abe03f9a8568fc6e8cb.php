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

/* categorie_article/index.html.twig */
class __TwigTemplate_684f7167cf0ff806dfdf3200f28ba7b8 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "categorie_article/index.html.twig"));

        $this->parent = $this->loadTemplate("layoutBackOffice.html.twig", "categorie_article/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "CategorieArticle index";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>CategorieArticle index</h1>

    <table class=\"table\" id='rss'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom_cat_artic</th>
                <th>Date_ajout_artic</th>
                <th>Descriptif_artic</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
         <input type=\"search\" id=\"myInput\" class=\"form-control pl-6\" placeholder=\"Search \"/>
\t\t\t\t\t
\t\t\t\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js\"></script>
\t\t\t\t\t<script>
\t\t\t\t\t\t\$(document).ready(function () {
                        \$(\"#myInput\").on(\"keyup\", function () {
                        var value = \$(this).val().toLowerCase();
                        \$(\"#rss tr\").filter(function () {
                        \$(this).toggle(\$(this).text().toLowerCase().indexOf(value) > -1)
                            });
                         })
                        });
\t\t\t\t\t</script>
        ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categorie_articles"]) || array_key_exists("categorie_articles", $context) ? $context["categorie_articles"] : (function () { throw new RuntimeError('Variable "categorie_articles" does not exist.', 32, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["categorie_article"]) {
            // line 33
            echo "            <tr>
                <td>";
            // line 34
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["categorie_article"], "id", [], "any", false, false, false, 34), "html", null, true);
            echo "</td>
                <td>";
            // line 35
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["categorie_article"], "nomCatArtic", [], "any", false, false, false, 35), "html", null, true);
            echo "</td>
                <td>";
            // line 36
            ((twig_get_attribute($this->env, $this->source, $context["categorie_article"], "dateAjoutArtic", [], "any", false, false, false, 36)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["categorie_article"], "dateAjoutArtic", [], "any", false, false, false, 36), "Y-m-d"), "html", null, true))) : (print ("")));
            echo "</td>
                <td>";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["categorie_article"], "descriptifArtic", [], "any", false, false, false, 37), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categorie_article_show", ["id" => twig_get_attribute($this->env, $this->source, $context["categorie_article"], "id", [], "any", false, false, false, 39)]), "html", null, true);
            echo "\">show</a>
                    <a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categorie_article_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["categorie_article"], "id", [], "any", false, false, false, 40)]), "html", null, true);
            echo "\">edit</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 44
            echo "            <tr>
                <td colspan=\"5\">no records found</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categorie_article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "        </tbody>
    </table>

    <a href=\"";
        // line 51
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categorie_article_new");
        echo "\">Create new</a>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "categorie_article/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 51,  148 => 48,  139 => 44,  130 => 40,  126 => 39,  121 => 37,  117 => 36,  113 => 35,  109 => 34,  106 => 33,  101 => 32,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layoutBackOffice.html.twig' %}

{% block title %}CategorieArticle index{% endblock %}

{% block body %}
    <h1>CategorieArticle index</h1>

    <table class=\"table\" id='rss'>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom_cat_artic</th>
                <th>Date_ajout_artic</th>
                <th>Descriptif_artic</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
         <input type=\"search\" id=\"myInput\" class=\"form-control pl-6\" placeholder=\"Search \"/>
\t\t\t\t\t
\t\t\t\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js\"></script>
\t\t\t\t\t<script>
\t\t\t\t\t\t\$(document).ready(function () {
                        \$(\"#myInput\").on(\"keyup\", function () {
                        var value = \$(this).val().toLowerCase();
                        \$(\"#rss tr\").filter(function () {
                        \$(this).toggle(\$(this).text().toLowerCase().indexOf(value) > -1)
                            });
                         })
                        });
\t\t\t\t\t</script>
        {% for categorie_article in categorie_articles %}
            <tr>
                <td>{{ categorie_article.id }}</td>
                <td>{{ categorie_article.nomCatArtic }}</td>
                <td>{{ categorie_article.dateAjoutArtic ? categorie_article.dateAjoutArtic|date('Y-m-d') : '' }}</td>
                <td>{{ categorie_article.descriptifArtic }}</td>
                <td>
                    <a href=\"{{ path('app_categorie_article_show', {'id': categorie_article.id}) }}\">show</a>
                    <a href=\"{{ path('app_categorie_article_edit', {'id': categorie_article.id}) }}\">edit</a>
                </td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"5\">no records found</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <a href=\"{{ path('app_categorie_article_new') }}\">Create new</a>
{% endblock %}
", "categorie_article/index.html.twig", "C:\\Users\\MSI\\Desktop\\arslen\\piweb\\templates\\categorie_article\\index.html.twig");
    }
}
