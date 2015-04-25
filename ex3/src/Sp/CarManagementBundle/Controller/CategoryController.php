<?php

namespace Sp\CarManagementBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Sp\CarManagementBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;


class CategoryController extends Controller
{
    /**
     * @Route("/category", name="category")
     */
    public function indexAction(Request $request){

        $categoryRepository = $this->getDoctrine()->getRepository('CarManagementBundle:Category');

        /*
         * New Category Form Handling
         * */
        $category = new Category();

        $newCategoryForm = $this->createFormBuilder($category)
            ->add('name', 'text')
            ->add('save', 'submit')
            ->getForm();

        $newCategoryForm->handleRequest($request);

        if ($newCategoryForm->isValid()) {
            $categoryRepository->addNewCategory($category->getName());

            return $this->redirect($this->generateUrl('category'));
        }

        /*
         * List Categories
         * */

        $categories = $categoryRepository->findAll();
        $namesets = array();

        for($i=0; $i<count($categories); $i++){
            $namesets[$i] = $categories[$i]->getName();
        }

        /*
        * Edit Category Form Handling
        * */

        $editCategoryForm = $this->createFormBuilder()
            ->add('category', 'choice', array('choice_list' => new ChoiceList($namesets, $namesets)))
            ->add('name', 'text')
            ->add('save', 'submit')
            ->getForm();

        $editCategoryForm->handleRequest($request);

        if ($editCategoryForm->isValid()) {
            $categoryRepository->editCategory($categories[$_POST["form"]["category"]]->getId(), $_POST["form"]["name"]);

            return $this->redirect($this->generateUrl('category'));
        }

        return $this->render('@CarManagement/Category/index.html.twig', array(
            'newCategoryForm' => $newCategoryForm->createView(),
            'editCategoryForm' => $editCategoryForm->createView(),
            'categories' => $categories
        ));
    }

    /**
     * @Route("/category/remove/{id}", name="categoryRemove")
     */
    public function removeCategoryAction($id){

        $categoryRepository = $this->getDoctrine()->getRepository('CarManagementBundle:Category');

        $categoryRepository->removeCategory($id);

        return $this->redirect($this->generateUrl('category'));
    }
}
