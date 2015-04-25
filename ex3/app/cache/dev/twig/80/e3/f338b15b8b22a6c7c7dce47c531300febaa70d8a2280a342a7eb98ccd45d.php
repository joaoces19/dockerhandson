<?php

/* CarManagementBundle:Cars:index.html.twig */
class __TwigTemplate_80e3f338b15b8b22a6c7c7dce47c531300febaa70d8a2280a342a7eb98ccd45d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Cars Page!";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "
    <h1>Add New Car</h1>
    ";
        // line 8
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["newCarForm"]) ? $context["newCarForm"] : $this->getContext($context, "newCarForm")), 'form_start');
        echo "
    ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["newCarForm"]) ? $context["newCarForm"] : $this->getContext($context, "newCarForm")), 'widget');
        echo "
    ";
        // line 10
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["newCarForm"]) ? $context["newCarForm"] : $this->getContext($context, "newCarForm")), 'form_end');
        echo "

    <br/><br/>
    <h1>Car List </h1>

    <table>
        ";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["cars"]) ? $context["cars"] : $this->getContext($context, "cars")));
        foreach ($context['_seq'] as $context["_key"] => $context["car"]) {
            // line 17
            echo "            <tr>
                <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["car"], "category", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["car"], "brand", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["car"], "model", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["car"], "year", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["car"], "fueltype", array()), "html", null, true);
            echo "</td>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["car"], "priceperday", array()), "html", null, true);
            echo "</td>
                <td>
                    ";
            // line 25
            if (($this->getAttribute($context["car"], "status", array()) == 1)) {
                // line 26
                echo "                        <b>Activo</b>
                    ";
            } else {
                // line 28
                echo "                        Inactivo
                    ";
            }
            // line 30
            echo "                </td>
                <td><a href='";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("carRemove", array("id" => $this->getAttribute($context["car"], "id", array()))), "html", null, true);
            echo "'>remove</a></td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['car'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "    </table>
";
    }

    public function getTemplateName()
    {
        return "CarManagementBundle:Cars:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 34,  112 => 31,  109 => 30,  105 => 28,  101 => 26,  99 => 25,  94 => 23,  90 => 22,  86 => 21,  82 => 20,  78 => 19,  74 => 18,  71 => 17,  67 => 16,  58 => 10,  54 => 9,  50 => 8,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
