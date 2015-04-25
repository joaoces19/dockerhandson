<?php

namespace Sp\CarManagementBundle\Controller;

use Sp\CarManagementBundle\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class CarController extends Controller
{
    /**
     * @Route("/car", name="car")
     */
    public function indexAction(Request $request)
    {
        $carRepository = $this->getDoctrine()->getRepository('CarManagementBundle:Car');
        $categoryRepository = $this->getDoctrine()->getRepository('CarManagementBundle:Category');

        $categories = $categoryRepository->findAll();
        $namesets = array();

        for($i=0; $i<count($categories); $i++){
            $namesets[$i] = $categories[$i]->getName();
        }

        $car = new Car();
        $newCarForm = $this->createFormBuilder($car)
            ->add('category', 'choice', array('choice_list' => new ChoiceList($namesets, $namesets)))
            ->add('brand', 'text')
            ->add('model', 'text')
            ->add('year', 'number')
            ->add('fueltype', 'text')
            ->add('priceperday', 'number')
            ->add('status', 'checkbox', array('required'=>false))
            ->add('save', 'submit')
            ->getForm();

        $newCarForm->handleRequest($request);

        if($newCarForm->isValid()){
            $carRepository->addCar($car, $categories[$_POST["form"]["category"]]->getId());

            return $this->redirect($this->generateUrl('car'));
        }

        /*
         * List Cars
         * */

        $cars = $carRepository->findAll();

        return $this->render('@CarManagement/Cars/index.html.twig', array('newCarForm' => $newCarForm->createView(), 'cars' => $cars));
    }

    /**
     * @Route("/car/remove/{id}", name="carRemove")
     */
    public function removeCarAction($id){

        $carRepository = $this->getDoctrine()->getRepository('CarManagementBundle:Car');

        $carRepository->removeCar($id);

        return $this->redirect($this->generateUrl('car'));
    }
}