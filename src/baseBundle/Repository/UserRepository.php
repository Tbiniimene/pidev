<?php

namespace baseBundle\Repository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{

    public function finduserPrametre($cin){
        $query=$this->getEntityManager()
            ->createQuery("SELECT m from baseBundle:User m WHERE m.cin='$cin'");
        return $query->getResult();
    }
}
