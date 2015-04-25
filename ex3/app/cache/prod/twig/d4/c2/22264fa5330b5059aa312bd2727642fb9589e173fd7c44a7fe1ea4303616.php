<?php

/* @CarManagement/Category/index.html.twig */
class __TwigTemplate_d4c222264fa5330b5059aa312bd2727642fb9589e173fd7c44a7fe1ea4303616 extends Twig_Template
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
        echo "Categories Page!";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    <h1>Add New Category </h1>
    ";
        // line 7
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["newCategoryForm"]) ? $context["newCategoryForm"] : null), 'form_start');
        echo "
    ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["newCategoryForm"]) ? $context["newCategoryForm"] : null), 'widget');
        echo "
    ";
        // line 9
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["newCategoryForm"]) ? $context["newCategoryForm"] : null), 'form_end');
        echo "

    <br/><br/>

    <h1>Edit Category Name </h1>

    ";
        // line 15
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["editCategoryForm"]) ? $context["editCategoryForm"] : null), 'form_start');
        echo "
    ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["editCategoryForm"]) ? $context["editCategoryForm"] : null), 'widget');
        echo "
    ";
        // line 17
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["editCategoryForm"]) ? $context["editCategoryForm"] : null), 'form_end');
        echo "

    <br/><br/>

    <h1>Category List </h1>

    <ul>
        ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 25
            echo "            <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
            echo "
                <a href='";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("categoryRemove", array("id" => $this->getAttribute($context["category"], "id", array()))), "html", null, true);
            echo "'>remove</a>
            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "    </ul>
";
    }

    public function getTemplateName()
    {
        return "@CarManagement/Category/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 29,  93 => 26,  88 => 25,  84 => 24,  74 => 17,  70 => 16,  66 => 15,  57 => 9,  53 => 8,  49 => 7,  46 => 6,  43 => 5,  37 => 3,  11 => 1,);
    }
}
