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

/* layoutFrontOffice.html.twig */
class __TwigTemplate_a9e28285ffadab45e7f91a2fd1bad6f4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "layoutFrontOffice.html.twig"));

        // line 1
        echo "

    <!DOCTYPE html>
<html lang=\"en\">
<head>
    <title>Palette Place | ESPRIT</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/open-iconic-bootstrap.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/animate.css"), "html", null, true);
        echo "\">
    
    <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/owl.carousel.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/owl.theme.default.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/magnific-popup.css"), "html", null, true);
        echo "\">

    <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/aos.css"), "html", null, true);
        echo "\">

    <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/ionicons.min.css"), "html", null, true);
        echo "\">

    <link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/bootstrap-datepicker.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/jquery.timepicker.css"), "html", null, true);
        echo "\">
 <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">

    
    <link rel=\"stylesheet\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/flaticon.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/icomoon.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/css/style.css"), "html", null, true);
        echo "\">
  </head>
  <body>

    
      <nav class=\"navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light\" id=\"ftco-navbar\">
        <div class=\"container\">
          <a class=\"navbar-brand\" href=\"index.html\">Palette<span>Place</span></a>
          <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#ftco-nav\" aria-controls=\"ftco-nav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"oi oi-menu\"></span> Menu
          </button>

          <div class=\"collapse navbar-collapse\" id=\"ftco-nav\">
            <ul class=\"navbar-nav ml-auto\">
              <li class=\"nav-item active\"><a href=\"index.html\" class=\"nav-link\">Acceuil</a></li>
              <li class=\"nav-item\"><a href=\"about.html\" class=\"nav-link\">A propos</a></li>
              <li class=\"nav-item\"><a href=\"";
        // line 46
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_indexFront");
        echo "\" class=\"nav-link\">Article</a></li>
              <li class=\"nav-item\"><a href=\"doctors.html\" class=\"nav-link\">Evenement</a></li>
              <li class=\"nav-item\"><a href=\"blog.html\" class=\"nav-link\">Blog</a></li>
              <li class=\"nav-item\"><a href=\"contact.html\" class=\"nav-link\">Contact</a></li>
              <li class=\"nav-item cta\"><a href=\"contact.html\" class=\"nav-link\" data-toggle=\"modal\" data-target=\"#modalRequest\"><span>Réserver</span></a></li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- END nav -->


    <section class=\"home-slider owl-carousel\">
      
      <div class=\"slider-item\" style=\"background-image: url('";
        // line 60
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/images/tt1.jpg"), "html", null, true);
        echo "');\">
        <div class=\"overlay\"></div>
        <div class=\"container\">
          <div class=\"row slider-text align-items-center\" data-scrollax-parent=\"true\">
            <div class=\"col-md-6 col-sm-12 ftco-animate\" data-scrollax=\" properties: { translateY: '70%' }\">
              <h1 class=\"mb-4\" data-scrollax=\"properties: { translateY: '30%', opacity: 1.6 }\">Votre galerie d'art en ligne</h1>
              <p class=\"mb-4\">que vous soyez artiste ou passioné</p>
              <p class=\"mb-4\">Nous avons ce qu'il vous faut</p>
        

            </div>
          </div>
        </div>
      </div>
    </section>


            ";
        // line 77
        $this->displayBlock('body', $context, $blocks);
        // line 78
        echo " <!-- loader -->
  <div id=\"ftco-loader\" class=\"show fullscreen\"><svg class=\"circular\" width=\"48px\" height=\"48px\"><circle class=\"path-bg\" cx=\"24\" cy=\"24\" r=\"22\" fill=\"none\" stroke-width=\"4\" stroke=\"#eeeeee\"/><circle class=\"path\" cx=\"24\" cy=\"24\" r=\"22\" fill=\"none\" stroke-width=\"4\" stroke-miterlimit=\"10\" stroke=\"#F96D00\"/></svg></div>

  <!-- Modal -->
  <div class=\"modal fade\" id=\"modalRequest\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"modalRequestLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\" id=\"modalRequestLabel\">Reserver</h5>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>
        <div class=\"modal-body\">
          <form action=\"#\">
            <div class=\"form-group\">
              <!-- <label for=\"appointment_name\" class=\"text-black\">Full Name</label> -->
              <input type=\"text\" class=\"form-control\" id=\"appointment_name\" placeholder=\"Full Name\">
            </div>
            <div class=\"form-group\">
              <!-- <label for=\"appointment_email\" class=\"text-black\">Email</label> -->
              <input type=\"text\" class=\"form-control\" id=\"appointment_email\" placeholder=\"Email\">
            </div>
            <div class=\"row\">
              <div class=\"col-md-6\">
                <div class=\"form-group\">
                  <!-- <label for=\"appointment_date\" class=\"text-black\">Date</label> -->
                  <input type=\"text\" class=\"form-control appointment_date\" placeholder=\"Date\">
                </div>    
              </div>
              <div class=\"col-md-6\">
                <div class=\"form-group\">
                  <!-- <label for=\"appointment_time\" class=\"text-black\">Time</label> -->
                  <input type=\"text\" class=\"form-control appointment_time\" placeholder=\"Time\">
                </div>
              </div>
            </div>
            

            <div class=\"form-group\">
              <!-- <label for=\"appointment_message\" class=\"text-black\">Message</label> -->
              <textarea name=\"\" id=\"appointment_message\" class=\"form-control\" cols=\"30\" rows=\"10\" placeholder=\"Message\"></textarea>
            </div>
            <div class=\"form-group\">
              <input type=\"submit\" value=\"Make an Appointment\" class=\"btn btn-primary\">
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
                     



<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
  <script src=\"";
        // line 135
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 136
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/jquery-migrate-3.0.1.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 137
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/popper.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/jquery.easing.1.3.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/jquery.waypoints.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/jquery.stellar.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 142
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/owl.carousel.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 143
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/jquery.magnific-popup.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 144
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/aos.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/jquery.animateNumber.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/bootstrap-datepicker.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 147
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/jquery.timepicker.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 148
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/scrollax.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false\"></script>
  <script src=\"";
        // line 150
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/google-map.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 151
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("assetsF/js/main.js"), "html", null, true);
        echo "\"></script>
</body>

</html>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 77
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        echo " ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "layoutFrontOffice.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  298 => 77,  286 => 151,  282 => 150,  277 => 148,  273 => 147,  269 => 146,  265 => 145,  261 => 144,  257 => 143,  253 => 142,  249 => 141,  245 => 140,  241 => 139,  237 => 138,  233 => 137,  229 => 136,  225 => 135,  166 => 78,  164 => 77,  144 => 60,  127 => 46,  108 => 30,  104 => 29,  100 => 28,  93 => 24,  89 => 23,  84 => 21,  79 => 19,  74 => 17,  70 => 16,  66 => 15,  61 => 13,  57 => 12,  52 => 10,  41 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("

    <!DOCTYPE html>
<html lang=\"en\">
<head>
    <title>Palette Place | ESPRIT</title>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    
    <link href=\"{{asset('assetsF/https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700')}}\" rel=\"stylesheet\">

    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/open-iconic-bootstrap.min.css')}}\">
    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/animate.css')}}\">
    
    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/owl.carousel.min.css')}}\">
    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/owl.theme.default.min.css')}}\">
    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/magnific-popup.css')}}\">

    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/aos.css')}}\">

    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/ionicons.min.css')}}\">

    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/bootstrap-datepicker.css')}}\">
    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/jquery.timepicker.css')}}\">
 <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css\" rel=\"stylesheet\">

    
    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/flaticon.css')}}\">
    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/icomoon.css')}}\">
    <link rel=\"stylesheet\" href=\"{{asset('assetsF/css/style.css')}}\">
  </head>
  <body>

    
      <nav class=\"navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light\" id=\"ftco-navbar\">
        <div class=\"container\">
          <a class=\"navbar-brand\" href=\"index.html\">Palette<span>Place</span></a>
          <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#ftco-nav\" aria-controls=\"ftco-nav\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
            <span class=\"oi oi-menu\"></span> Menu
          </button>

          <div class=\"collapse navbar-collapse\" id=\"ftco-nav\">
            <ul class=\"navbar-nav ml-auto\">
              <li class=\"nav-item active\"><a href=\"index.html\" class=\"nav-link\">Acceuil</a></li>
              <li class=\"nav-item\"><a href=\"about.html\" class=\"nav-link\">A propos</a></li>
              <li class=\"nav-item\"><a href=\"{{path('app_article_indexFront')}}\" class=\"nav-link\">Article</a></li>
              <li class=\"nav-item\"><a href=\"doctors.html\" class=\"nav-link\">Evenement</a></li>
              <li class=\"nav-item\"><a href=\"blog.html\" class=\"nav-link\">Blog</a></li>
              <li class=\"nav-item\"><a href=\"contact.html\" class=\"nav-link\">Contact</a></li>
              <li class=\"nav-item cta\"><a href=\"contact.html\" class=\"nav-link\" data-toggle=\"modal\" data-target=\"#modalRequest\"><span>Réserver</span></a></li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- END nav -->


    <section class=\"home-slider owl-carousel\">
      
      <div class=\"slider-item\" style=\"background-image: url('{{asset('assetsF/images/tt1.jpg')}}');\">
        <div class=\"overlay\"></div>
        <div class=\"container\">
          <div class=\"row slider-text align-items-center\" data-scrollax-parent=\"true\">
            <div class=\"col-md-6 col-sm-12 ftco-animate\" data-scrollax=\" properties: { translateY: '70%' }\">
              <h1 class=\"mb-4\" data-scrollax=\"properties: { translateY: '30%', opacity: 1.6 }\">Votre galerie d'art en ligne</h1>
              <p class=\"mb-4\">que vous soyez artiste ou passioné</p>
              <p class=\"mb-4\">Nous avons ce qu'il vous faut</p>
        

            </div>
          </div>
        </div>
      </div>
    </section>


            {% block body %} {% endblock %}
 <!-- loader -->
  <div id=\"ftco-loader\" class=\"show fullscreen\"><svg class=\"circular\" width=\"48px\" height=\"48px\"><circle class=\"path-bg\" cx=\"24\" cy=\"24\" r=\"22\" fill=\"none\" stroke-width=\"4\" stroke=\"#eeeeee\"/><circle class=\"path\" cx=\"24\" cy=\"24\" r=\"22\" fill=\"none\" stroke-width=\"4\" stroke-miterlimit=\"10\" stroke=\"#F96D00\"/></svg></div>

  <!-- Modal -->
  <div class=\"modal fade\" id=\"modalRequest\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"modalRequestLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\" id=\"modalRequestLabel\">Reserver</h5>
          <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
          </button>
        </div>
        <div class=\"modal-body\">
          <form action=\"#\">
            <div class=\"form-group\">
              <!-- <label for=\"appointment_name\" class=\"text-black\">Full Name</label> -->
              <input type=\"text\" class=\"form-control\" id=\"appointment_name\" placeholder=\"Full Name\">
            </div>
            <div class=\"form-group\">
              <!-- <label for=\"appointment_email\" class=\"text-black\">Email</label> -->
              <input type=\"text\" class=\"form-control\" id=\"appointment_email\" placeholder=\"Email\">
            </div>
            <div class=\"row\">
              <div class=\"col-md-6\">
                <div class=\"form-group\">
                  <!-- <label for=\"appointment_date\" class=\"text-black\">Date</label> -->
                  <input type=\"text\" class=\"form-control appointment_date\" placeholder=\"Date\">
                </div>    
              </div>
              <div class=\"col-md-6\">
                <div class=\"form-group\">
                  <!-- <label for=\"appointment_time\" class=\"text-black\">Time</label> -->
                  <input type=\"text\" class=\"form-control appointment_time\" placeholder=\"Time\">
                </div>
              </div>
            </div>
            

            <div class=\"form-group\">
              <!-- <label for=\"appointment_message\" class=\"text-black\">Message</label> -->
              <textarea name=\"\" id=\"appointment_message\" class=\"form-control\" cols=\"30\" rows=\"10\" placeholder=\"Message\"></textarea>
            </div>
            <div class=\"form-group\">
              <input type=\"submit\" value=\"Make an Appointment\" class=\"btn btn-primary\">
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
                     



<script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
  <script src=\"{{asset('assetsF/js/jquery.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/jquery-migrate-3.0.1.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/popper.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/bootstrap.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/jquery.easing.1.3.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/jquery.waypoints.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/jquery.stellar.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/owl.carousel.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/jquery.magnific-popup.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/aos.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/jquery.animateNumber.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/bootstrap-datepicker.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/jquery.timepicker.min.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/scrollax.min.js')}}\"></script>
  <script src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false\"></script>
  <script src=\"{{asset('assetsF/js/google-map.js')}}\"></script>
  <script src=\"{{asset('assetsF/js/main.js')}}\"></script>
</body>

</html>
", "layoutFrontOffice.html.twig", "C:\\Users\\MSI\\Desktop\\arslen\\piweb\\templates\\layoutFrontOffice.html.twig");
    }
}
