<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/ca')) {
            if (0 === strpos($pathinfo, '/car')) {
                // car
                if ($pathinfo === '/car') {
                    return array (  '_controller' => 'Sp\\CarManagementBundle\\Controller\\CarController::indexAction',  '_route' => 'car',);
                }

                // carRemove
                if (0 === strpos($pathinfo, '/car/remove') && preg_match('#^/car/remove/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'carRemove')), array (  '_controller' => 'Sp\\CarManagementBundle\\Controller\\CarController::removeCarAction',));
                }

            }

            if (0 === strpos($pathinfo, '/category')) {
                // category
                if ($pathinfo === '/category') {
                    return array (  '_controller' => 'Sp\\CarManagementBundle\\Controller\\CategoryController::indexAction',  '_route' => 'category',);
                }

                // categoryRemove
                if (0 === strpos($pathinfo, '/category/remove') && preg_match('#^/category/remove/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'categoryRemove')), array (  '_controller' => 'Sp\\CarManagementBundle\\Controller\\CategoryController::removeCategoryAction',));
                }

            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'Sp\\CarManagementBundle\\Controller\\CategoryController::indexAction',  '_route' => 'homepage',);
        }
        not_homepage:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
