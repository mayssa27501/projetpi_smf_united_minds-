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

/* pdf/index.html.twig */
class __TwigTemplate_323c55e91cc9a9a3430268e8ff2a1766 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "pdf/index.html.twig"));

        // line 1
        echo "<h1 style=\"text-align: center;\">Liste des articles</h1>

<table border=\"1\">
    <thead>
        <tr>
            <th style=\"color:#009CFF;\">Id Article</th>
            <th style=\"color:#009CFF;\">Titre</th>
            <th style=\"color:#009CFF;\">Description</th>
            <th style=\"color:#009CFF;\">Date</th>
            <th style=\"color:#009CFF;\">Categorie</th>
        </tr>  
    </thead>
    <tbody>
        ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["articles"]) || array_key_exists("articles", $context) ? $context["articles"] : (function () { throw new RuntimeError('Variable "articles" does not exist.', 14, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 15
            echo "            <tr>
                <td>";
            // line 16
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 16), "html", null, true);
            echo "</td>
                <td>";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getTitreArtic", [], "method", false, false, false, 17), "html", null, true);
            echo "</td>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getDescriptifArtic", [], "method", false, false, false, 18), "html", null, true);
            echo "</td>
                <td>";
            // line 19
            ((twig_get_attribute($this->env, $this->source, $context["article"], "getDateAjoutArtic", [], "method", false, false, false, 19)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getDateAjoutArtic", [], "method", false, false, false, 19), "Y-m-d"), "html", null, true))) : (print ("")));
            echo "</td>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getCategorieArticle", [], "method", false, false, false, 20), "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "    </tbody>
</table>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "pdf/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 23,  78 => 20,  74 => 19,  70 => 18,  66 => 17,  62 => 16,  59 => 15,  55 => 14,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h1 style=\"text-align: center;\">Liste des articles</h1>

<table border=\"1\">
    <thead>
        <tr>
            <th style=\"color:#009CFF;\">Id Article</th>
            <th style=\"color:#009CFF;\">Titre</th>
            <th style=\"color:#009CFF;\">Description</th>
            <th style=\"color:#009CFF;\">Date</th>
            <th style=\"color:#009CFF;\">Categorie</th>
        </tr>  
    </thead>
    <tbody>
        {% for article in articles %}
            <tr>
                <td>{{ article.id }}</td>
                <td>{{ article.getTitreArtic() }}</td>
                <td>{{ article.getDescriptifArtic() }}</td>
                <td>{{ article.getDateAjoutArtic() ? article.getDateAjoutArtic()|date('Y-m-d') : '' }}</td>
                <td>{{ article.getCategorieArticle() }}</td>
            </tr>
        {% endfor %}
    </tbody>
</table>
", "pdf/index.html.twig", "C:\\Users\\MSI\\Desktop\\arslen\\piweb\\templates\\pdf\\index.html.twig");
    }
}
