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

/* article/indexFront.html.twig */
class __TwigTemplate_acee805697de17e9c8fc215382ce0318 extends Template
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
        return "layoutFrontOffice.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "article/indexFront.html.twig"));

        $this->parent = $this->loadTemplate("layoutFrontOffice.html.twig", "article/indexFront.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Besoin index";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 7
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo " <style> 
 .circular-image {
      width: 70%;
      height: 10%;
      object-fit: contain;
    }
  </style>

    <h1>Soyez le bienvenue</h1>
    
<div class=\"row\">
  ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["articles"]) || array_key_exists("articles", $context) ? $context["articles"] : (function () { throw new RuntimeError('Variable "articles" does not exist.', 19, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 20
            echo "    <div class=\"col-md-4\">
      <div class=\"card mb-4 shadow-sm hover-effect\">
        <img src=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("photo/" . twig_get_attribute($this->env, $this->source, $context["article"], "image", [], "any", false, false, false, 22))), "html", null, true);
            echo "\" alt=\"Image placeholder\" class=\"card-img-top\" class=\"circular-image\">
        <div class=\"card-body\">
          <h5 class=\"card-title\">";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getTitreArtic", [], "method", false, false, false, 24), "html", null, true);
            echo "</h5>
          <p class=\"card-text\">";
            // line 25
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getThemeArtic", [], "method", false, false, false, 25), "html", null, true);
            echo "</p>
          <div class=\"d-flex justify-content-between align-items-center\">
            <div class=\"btn-group\">
              <a href=\"";
            // line 28
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_show", ["id" => twig_get_attribute($this->env, $this->source, $context["article"], "getId", [], "method", false, false, false, 28)]), "html", null, true);
            echo "\" class=\"btn btn-sm btn-outline-secondary\">Voir</a>
            </div>
            <small class=\"text-muted\">";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "getDescriptifArtic", [], "any", false, false, false, 30), "html", null, true);
            echo "  ♥</small>
          </div>
        </div>
        
      </div>
    </div>

    
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "    </div>

    <a href=\"";
        // line 41
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_new");
        echo "\" class=\"btn btn-outline-secondary\">Créer un nouvel article</a>

    <script>
        function showContent(event) {
            console.log(\"showContent() called\");
            event.preventDefault();
            var content = event.target.parentElement.nextElementSibling;
            content.classList.toggle(\"hide\");
        }
    </script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "article/indexFront.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 41,  129 => 39,  114 => 30,  109 => 28,  103 => 25,  99 => 24,  94 => 22,  90 => 20,  86 => 19,  73 => 8,  66 => 7,  53 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layoutFrontOffice.html.twig' %}

{% block title %}Besoin index{% endblock %}



{% block body %}
 <style> 
 .circular-image {
      width: 70%;
      height: 10%;
      object-fit: contain;
    }
  </style>

    <h1>Soyez le bienvenue</h1>
    
<div class=\"row\">
  {% for article in articles %}
    <div class=\"col-md-4\">
      <div class=\"card mb-4 shadow-sm hover-effect\">
        <img src=\"{{asset('photo/'~article.image)}}\" alt=\"Image placeholder\" class=\"card-img-top\" class=\"circular-image\">
        <div class=\"card-body\">
          <h5 class=\"card-title\">{{ article.getTitreArtic() }}</h5>
          <p class=\"card-text\">{{ article.getThemeArtic() }}</p>
          <div class=\"d-flex justify-content-between align-items-center\">
            <div class=\"btn-group\">
              <a href=\"{{ path('app_article_show', {'id': article.getId()}) }}\" class=\"btn btn-sm btn-outline-secondary\">Voir</a>
            </div>
            <small class=\"text-muted\">{{ article.getDescriptifArtic }}  ♥</small>
          </div>
        </div>
        
      </div>
    </div>

    
        {% endfor %}
    </div>

    <a href=\"{{ path('app_article_new') }}\" class=\"btn btn-outline-secondary\">Créer un nouvel article</a>

    <script>
        function showContent(event) {
            console.log(\"showContent() called\");
            event.preventDefault();
            var content = event.target.parentElement.nextElementSibling;
            content.classList.toggle(\"hide\");
        }
    </script>
{% endblock %}
", "article/indexFront.html.twig", "C:\\Users\\MSI\\Desktop\\arslen\\piweb\\templates\\article\\indexFront.html.twig");
    }
}
