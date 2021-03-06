<?php

namespace Sp\CarManagementBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Sp\CarManagementBundle\Entity\Category;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{

    public function addNewCategory($categoryName){
        $newCategory = new Category();
        $newCategory->setName($categoryName);

        $this->_em->persist($newCategory);
        $this->_em->flush();

        return $newCategory;
    }

    public function removeCategory($id){
        $category = $this->_em->getRepository('CarManagementBundle:Category')->find($id);

        $this->_em->remove($category);
        $this->_em->flush();
    }

    public function editCategory($id, $newName){
        $category = $this->_em->getRepository('CarManagementBundle:Category')->find($id);

        $category->setName($newName);

        $this->_em->flush();
    }
}
