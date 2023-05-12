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

/* categorie_article/show.html.twig */
class __TwigTemplate_26cac82b31aebb0bdab0533a3b9fa8a3 extends Template
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
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "categorie_article/show.html.twig"));

        $this->parent = $this->loadTemplate("layoutBackOffice.html.twig", "categorie_article/show.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "CategorieArticle";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "    <h1>CategorieArticle</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 12
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["categorie_article"]) || array_key_exists("categorie_article", $context) ? $context["categorie_article"] : (function () { throw new RuntimeError('Variable "categorie_article" does not exist.', 12, $this->source); })()), "id", [], "any", false, false, false, 12), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Nom_cat_artic</th>
                <td>";
        // line 16
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["categorie_article"]) || array_key_exists("categorie_article", $context) ? $context["categorie_article"] : (function () { throw new RuntimeError('Variable "categorie_article" does not exist.', 16, $this->source); })()), "nomCatArtic", [], "any", false, false, false, 16), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Date_ajout_artic</th>
                <td>";
        // line 20
        ((twig_get_attribute($this->env, $this->source, (isset($context["categorie_article"]) || array_key_exists("categorie_article", $context) ? $context["categorie_article"] : (function () { throw new RuntimeError('Variable "categorie_article" does not exist.', 20, $this->source); })()), "dateAjoutArtic", [], "any", false, false, false, 20)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["categorie_article"]) || array_key_exists("categorie_article", $context) ? $context["categorie_article"] : (function () { throw new RuntimeError('Variable "categorie_article" does not exist.', 20, $this->source); })()), "dateAjoutArtic", [], "any", false, false, false, 20), "Y-m-d"), "html", null, true))) : (print ("")));
        echo "</td>
            </tr>
            <tr>
                <th>Descriptif_artic</th>
                <td>";
        // line 24
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["categorie_article"]) || array_key_exists("categorie_article", $context) ? $context["categorie_article"] : (function () { throw new RuntimeError('Variable "categorie_article" does not exist.', 24, $this->source); })()), "descriptifArtic", [], "any", false, false, false, 24), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

    <a href=\"";
        // line 29
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categorie_article_index");
        echo "\">back to list</a>

    <a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_categorie_article_edit", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["categorie_article"]) || array_key_exists("categorie_article", $context) ? $context["categorie_article"] : (function () { throw new RuntimeError('Variable "categorie_article" does not exist.', 31, $this->source); })()), "id", [], "any", false, false, false, 31)]), "html", null, true);
        echo "\">edit</a>

    ";
        // line 33
        echo twig_include($this->env, $context, "categorie_article/_delete_form.html.twig");
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "categorie_article/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 33,  115 => 31,  110 => 29,  102 => 24,  95 => 20,  88 => 16,  81 => 12,  73 => 6,  66 => 5,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layoutBackOffice.html.twig' %}

{% block title %}CategorieArticle{% endblock %}

{% block body %}
    <h1>CategorieArticle</h1>

    <table class=\"table\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>{{ categorie_article.id }}</td>
            </tr>
            <tr>
                <th>Nom_cat_artic</th>
                <td>{{ categorie_article.nomCatArtic }}</td>
            </tr>
            <tr>
                <th>Date_ajout_artic</th>
                <td>{{ categorie_article.dateAjoutArtic ? categorie_article.dateAjoutArtic|date('Y-m-d') : '' }}</td>
            </tr>
            <tr>
                <th>Descriptif_artic</th>
                <td>{{ categorie_article.descriptifArtic }}</td>
            </tr>
        </tbody>
    </table>

    <a href=\"{{ path('app_categorie_article_index') }}\">back to list</a>

    <a href=\"{{ path('app_categorie_article_edit', {'id': categorie_article.id}) }}\">edit</a>

    {{ include('categorie_article/_delete_form.html.twig') }}
{% endblock %}
", "categorie_article/show.html.twig", "C:\\Users\\MSI\\Desktop\\arslen\\piweb\\templates\\categorie_article\\show.html.twig");
    }
}
